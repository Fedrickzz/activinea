<?php

namespace Controllers;

use Classes\Paginacio;
use MVC\Router;
use Model\Llibre;

class LlibresController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        if ($_SESSION['admin'] != 1) {
            header('Location: /user/dashboard');
        }

        
        
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /user/llibres?page=1');
        }
        $registres_per_pagina = 10;
        $total = Llibre::total();
        $paginacio = new Paginacio($pagina_actual, $registres_per_pagina, $total);

        if($paginacio->total_pagines() < $pagina_actual) {
            header('Location: /user/llibres?page=1');
        }

        $llibres = Llibre::paginar($registres_per_pagina, $paginacio->offset());


        $router->render('admin/llibres/index', [
            'titol' => 'Llibres inclusius',
            'llibres' => $llibres,
            'paginacio' => $paginacio->paginacio()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $alertes = [];
        $llibre = new Llibre;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }

            // Leer imagen
            if(!empty($_FILES['fileToUpload']['tmp_name'])) {
                
                $carpeta_imatges = '../public/img/llibres/';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imatges)) {
                    mkdir($carpeta_imatges, 0755, true);
                }

                $target_file = $carpeta_imatges . basename($_FILES["fileToUpload"]["name"]);

                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

                // $nom_imatge = md5( uniqid( rand(), true) );
                $_POST['imatge'] = $_FILES['fileToUpload']['name'];
            } 

            // codificar array a string
            // treure barra invertida
            $_POST['social'] = json_encode( $_POST['social'], JSON_UNESCAPED_SLASHES );        
            $llibre->sincronitzar($_POST);

            // validar
            $alertes = $llibre->validar();


            // Guardar el registre
            if(empty($alertes)) {

                // Guardar las imagenes
                // $imatge_png->save($carpeta_imatges . '/' . $nom_imatge . ".png" );
                // $imatge_webp->save($carpeta_imatges . '/' . $nom_imatge . ".webp" );


                // Guardar en la BD
                $resultat = $llibre->guardar();

                if($resultat) {
                    header('Location: /user/llibres');
                }
            }
        }

        $router->render('admin/llibres/crear', [
            'titol' => 'Registrar Material Didàctic',
            'alertes' => $alertes,
            'llibre' => $llibre,
            'social' => json_decode($llibre->social)
        ]);
    }


    public static function editar(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        $alertes = [];
        
        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /user/llibres');
        }

        // Obtenir el llibre per editar
        $llibre = Llibre::find($id);

        if(!$llibre) {
            header('Location: /user/llibres');
        }

        $llibre->imatge_actual = $llibre->imatge;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }

            if(!empty($_FILES['imatge']['tmp_name'])) {
                
                $carpeta_imatges = '../public/img/llibres/';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imatges)) {
                    mkdir($carpeta_imatges, 0755, true);
                }

                $target_file = $carpeta_imatges . basename($_FILES["fileToUpload"]["name"]);

                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

                // $nom_imatge = md5( uniqid( rand(), true) );
                $_POST['imatge'] = $_FILES['fileToUpload']['name'];

            } else {
                $_POST['imatge'] = $llibre->imatge_actual;
            }

            $_POST['social'] = json_encode( $_POST['social'], JSON_UNESCAPED_SLASHES );     
            $llibre->sincronitzar($_POST);

            $alertes = $llibre->validar();

            if(empty($alertes)) {
                // if(isset($nom_imatge)) {
                //     $imatge_png->save($carpeta_imatges . '/' . $nom_imatge . ".png" );
                //     $imatge_webp->save($carpeta_imatges . '/' . $nom_imatge . ".webp" );
                // }

                // Guardar en la BD
                $resultat = $llibre->guardar();
                if($resultat) {
                    header('Location: /user/llibres');
                }
            }

        }

        $router->render('admin/llibres/editar', [
            'titol' => 'Actualitzar Informació',
            'alertes' => $alertes,
            'llibre' => $llibre,
            'social' => json_decode($llibre->social)
        ]);

    }

    public static function eliminar() {
 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $llibre = llibre::find($id);
            if(!isset($llibre) ) {
                header('Location: /user/llibres');
            }
            $resultat = $llibre->eliminar();
            if($resultat) {
                header('Location: /user/llibres');
            }
        }

    }
}