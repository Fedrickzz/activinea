<?php

namespace Controllers;

use MVC\Router;

class DashboardController {
    public static function index(Router $router) {
        $router->render('admin/dashboard/index', [
            'titol' => "Panell d'Administració"
        ]);
    }
}