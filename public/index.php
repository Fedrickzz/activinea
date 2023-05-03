<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
use Controllers\DashboardController;
use MVC\Router;

$router = new Router();

// Home page
$router->get('/', [AuthController::class, 'home']);

// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Compte
$router->get('/registre', [AuthController::class, 'registre']);
$router->post('/registre', [AuthController::class, 'registre']);

// Formulari contrasenya oblidada
$router->get('/oblidada', [AuthController::class, 'oblidada']);
$router->post('/oblidada', [AuthController::class, 'oblidada']);

// Reestablir la nova contrasenya
$router->get('/reestablir', [AuthController::class, 'reestablir']);
$router->post('/reestablir', [AuthController::class, 'reestablir']);

// Confirmació de la nova contrasenya
$router->get('/missatge', [AuthController::class, 'missatge']);
$router->get('/confirmar-compte', [AuthController::class, 'confirmar']);

// Àrea d'administració
$router->get('/admin/dashboard', [DashboardController::class, 'index']);



$router->comprovarRutes();