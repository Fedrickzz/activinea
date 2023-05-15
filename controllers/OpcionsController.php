<?php

namespace Controllers;

use MVC\Router;
use Model\Usuari;

class OpcionsController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $alertes = [];
        // Validar el ID
        $id = $_SESSION['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/opcions');
        }

        // Obtenir usuari a Editar
        $usuari = usuari::find($id);

        if(!$usuari) {
            header('Location: /admin/opcions');
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
                    header('Location: /admin/opcions');
                }
            }
        }

        $router->render('admin/opcions/index', [
            'titol' => 'El teu compte',
            'alertes' => $alertes,
            'usuari' => $usuari,
            'social' => json_decode($usuari->social)
        ]);
    }
}