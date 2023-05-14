<?php

namespace Controllers;

use MVC\Router;


class ActivitatsController {
    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }


        $router->render('admin/activitats/index', [
            'titol' => "Activitats TIC"
        ]);
    }

    public static function habitacio(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }


        $router->render('admin/activitats/habitacio/index', [
            'titol' => "Habitació"
        ]);
    }

    public static function jocs(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }


        $router->render('admin/activitats/jocs/index', [
            'titol' => "Sala de Jocs"
        ]);
    }

    public static function lavabo(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $router->render('admin/activitats/lavabo/index', [
            'titol' => "Lavabo"
        ]);
    }

    public static function estar(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $router->render('admin/activitats/estar/index', [
            'titol' => "Sala d'Estar"
        ]);
    }

    public static function cuina(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $usuari = new Usuari;

        $router->render('admin/activitats/cuina/index', [
            'titol' => "Cuina"
        ]);
    }

    public static function hort(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $router->render('admin/activitats/hort/index', [
            'titol' => "Hort"
        ]);
    }
}