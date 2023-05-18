<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\LlibresController;
use Controllers\ActivitatsController;
use Controllers\RegistratsController;
use Controllers\OpcionsController;

use Controllers\PaginesController;
use MVC\Router;

$router = new Router();

// Àrea Pública
$router->get('/', [PaginesController::class, 'index']);
$router->get('/404', [PaginesController::class, 'error']);
$router->get('/info', [PaginesController::class, 'info']);
$router->get('/llibres', [PaginesController::class, 'llibres']);
$router->get('/plans', [PaginesController::class, 'plans']);


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

// llibres
$router->get('/admin/llibres', [LLibresController::class, 'index']);
$router->get('/admin/llibres/crear', [LLibresController::class, 'crear']);
$router->post('/admin/llibres/crear', [LLibresController::class, 'crear']);
$router->get('/admin/llibres/editar', [LLibresController::class, 'editar']);
$router->post('/admin/llibres/editar', [LLibresController::class, 'editar']);
$router->post('/admin/llibres/eliminar', [LLibresController::class, 'eliminar']);

// Usuaris
$router->get('/admin/registrats', [RegistratsController::class, 'index']);
$router->get('/admin/registrats/crear', [RegistratsController::class, 'crear']);
$router->post('/admin/registrats/crear', [RegistratsController::class, 'crear']);
$router->get('/admin/registrats/editar', [RegistratsController::class, 'editar']);
$router->post('/admin/registrats/editar', [RegistratsController::class, 'editar']);
$router->post('/admin/registrats/eliminar', [RegistratsController::class, 'eliminar']);

$router->get('/admin/opcions', [OpcionsController::class, 'index']);
$router->post('/admin/opcions', [OpcionsController::class, 'index']);

// Activitats
$router->get('/admin/activitats', [ActivitatsController::class, 'index']);
$router->get('/admin/activitats/sala-habitacio', [ActivitatsController::class, 'habitacio']);
$router->get('/admin/activitats/sala-jocs', [ActivitatsController::class, 'jocs']);
$router->get('/admin/activitats/sala-lavabo', [ActivitatsController::class, 'lavabo']);
$router->get('/admin/activitats/sala-sala_estar', [ActivitatsController::class, 'estar']);
$router->get('/admin/activitats/sala-cuina', [ActivitatsController::class, 'cuina']);

$router->get('/admin/activitats/sala-hort', [ActivitatsController::class, 'hort']);
$router->post('/admin/activitats/sala-hort', [ActivitatsController::class, 'hort']);




$router->comprovarRutes();