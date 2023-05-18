<?php

namespace Controllers;
use Classes\Paginacio;
use MVC\Router;
use Model\Usuari;

class RegistratsController {

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
            header('Location: /user/registrats?page=1');
        }
        $registres_per_pagina = 5;
        $total = Usuari::total();
        $paginacio = new Paginacio($pagina_actual, $registres_per_pagina, $total);

        if($paginacio->total_pagines() < $pagina_actual) {
            header('Location: /user/registrats?page=1');
        }

        $usuaris = Usuari::paginar($registres_per_pagina, $paginacio->offset());



        $router->render('admin/registrats/index', [
            'titol' => 'Usuaris registrats',
            'usuaris' => $usuaris,
            'paginacio' => $paginacio->paginacio()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        if ($_SESSION['admin'] != 1) {
            header('Location: /user/dashboard');
        }

        $alertes = [];
        $usuari = new Usuari;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }

            // Llegir imatge
            if(!empty($_FILES['fileToUpload']['tmp_name'])) {
                
                $carpeta_imatges = '../public/img/speakers/';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imatges)) {
                    mkdir($carpeta_imatges, 0755, true);
                }

                $target_file = $carpeta_imatges . basename($_FILES["fileToUpload"]["name"]);

                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

                // $imatge_png = Image::make($_FILES['imatge']['tmp_name'])->fit(800,800)->encode('png', 80);
                // $imatge_webp = Image::make($_FILES['imatge']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nom_imatge = md5( uniqid( rand(), true) );
                $_POST['imatge'] = $nom_imatge;
            } 

            // codificar array a string
            // treure barra invertida
            $_POST['social'] = json_encode( $_POST['social'], JSON_UNESCAPED_SLASHES );        
            $usuari->sincronitzar($_POST);

            // validar
            $alertes = $usuari->validar();

            // Guardar el registro
            if(empty($alertes)) {

                // Guardar las imagenes
                // $imatge_png->save($carpeta_imatges . '/' . $nom_imatge . ".png" );
                // $imatge_webp->save($carpeta_imatges . '/' . $nom_imatge . ".webp" );


                // Guardar en la BD
                $resultat = $usuari->guardar();

                if($resultat) {
                    header('Location: /user/registrats');
                }
            }
        }

        $router->render('admin/registrats/crear', [
            'titol' => 'Registrar Usuari',
            'alertes' => $alertes,
            'usuari' => $usuari,
            'social' => json_decode($usuari->social)
        ]);
    }


    public static function editar(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        if ($_SESSION['admin'] != 1) {
            header('Location: /user/dashboard');
        }

        $alertes = [];
        // Validar ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /user/registrats');
        }

        // Obtenir usuari a Editar
        $usuari = usuari::find($id);

        if(!$usuari) {
            header('Location: /user/registrats');
        }

        $usuari->imatge_actual = $usuari->imatge;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }

            if(!empty($_FILES['imatge']['tmp_name'])) {
                
                $carpeta_imatges = '../public/img/speakers';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imatges)) {
                    mkdir($carpeta_imatges, 0755, true);
                }

                $imatge_png = Image::make($_FILES['imatge']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imatge_webp = Image::make($_FILES['imatge']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nom_imatge = md5( uniqid( rand(), true) );

                $_POST['imatge'] = $nom_imatge;
            } else {
                $_POST['imatge'] = $usuari->imatge_actual;
            }

            $_POST['social'] = json_encode( $_POST['social'], JSON_UNESCAPED_SLASHES );     
            $usuari->sincronitzar($_POST);

            $alertes = $usuari->validar();

            if(empty($alertes)) {
                if(isset($nom_imatge)) {
                    $imatge_png->save($carpeta_imatges . '/' . $nom_imatge . ".png" );
                    $imatge_webp->save($carpeta_imatges . '/' . $nom_imatge . ".webp" );
                }
                $resultat = $usuari->guardar();
                if($resultat) {
                    header('Location: /user/registrats');
                }
            }

        }

        $router->render('admin/registrats/editar', [
            'titol' => 'Actualitzar Usuari',
            'alertes' => $alertes,
            'usuari' => $usuari,
            'social' => json_decode($usuari->social)
        ]);

    }

    public static function eliminar() {

        if ($_SESSION['admin'] != 1) {
            header('Location: /user/dashboard');
        }
 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $usuari = usuari::find($id);
            if(!isset($usuari) ) {
                header('Location: /user/registrats');
            }
            $resultat = $usuari->eliminar();
            if($resultat) {
                header('Location: /user/registrats');
            }
        }

    }
}