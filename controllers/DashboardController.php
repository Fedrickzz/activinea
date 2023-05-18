<?php

namespace Controllers;

use MVC\Router;

class DashboardController {
    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        // Validar el ID
        $id = $_SESSION['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        // if(!$id) {
        //     header('Location: /admin/opcions');
        // }

        // Obtenir usuari a Editar
        // $usuari = usuari::find($id);

        
        $router->render('admin/dashboard/index', [
            'titol' => 'La Teva Puntuació',
            'joc_1' => "Joc: El Cicle",
            'joc_2' => "Joc: Gotes",
            'joc_3' => "Joc: Memòria",
            'joc_4' => "Joc: L'armari",
            'usuari' => $usuari,
        ]);
    }
}