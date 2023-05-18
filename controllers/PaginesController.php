<?php

namespace Controllers;

use MVC\Router;
use Model\Llibre;

class PaginesController {
    public static function index(Router $router) {

        // Obtenir el total de llibres
        $llibres_total = Llibre::total();

        // Obtenir tots els llibres
        $llibres = Llibre::all();

        $router->render('pagines/index', [
            'titol' => 'Inici',
            'llibres_total' => $llibres_total,
            'llibres' => $llibres
        ]);
    }

    public static function info(Router $router) {

        $router->render('pagines/info', [
            'titol' => 'Sobre Activinea'
        ]);
    }

    public static function llibres(Router $router) {

        $router->render('pagines/llibres-inclusius', [
            'titol' => 'Llibres inclusius'
        ]);
    }

    public static function plans(Router $router) {

        $router->render('pagines/plans', [
            'titol' => 'Els nostres Productes i Serveis'
        ]);
    }

    public static function error(Router $router) {

        $router->render('pagines/error', [
            'titol' => 'Pàgina no trobada'
        ]);
    }
}