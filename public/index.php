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

// Restablir la nova contrasenya
$router->get('/restablir', [AuthController::class, 'restablir']);
$router->post('/restablir', [AuthController::class, 'restablir']);

// Confirmació de la nova contrasenya
$router->get('/missatge', [AuthController::class, 'missatge']);
$router->get('/confirmar-compte', [AuthController::class, 'confirmar']);

// Àrea d'administració
$router->get('/user/dashboard', [DashboardController::class, 'index']);

// llibres
$router->get('/user/llibres', [LLibresController::class, 'index']);
$router->get('/user/llibres/crear', [LLibresController::class, 'crear']);
$router->post('/user/llibres/crear', [LLibresController::class, 'crear']);
$router->get('/user/llibres/editar', [LLibresController::class, 'editar']);
$router->post('/user/llibres/editar', [LLibresController::class, 'editar']);
$router->post('/user/llibres/eliminar', [LLibresController::class, 'eliminar']);

// Usuaris
$router->get('/user/registrats', [RegistratsController::class, 'index']);
$router->get('/user/registrats/crear', [RegistratsController::class, 'crear']);
$router->post('/user/registrats/crear', [RegistratsController::class, 'crear']);
$router->get('/user/registrats/editar', [RegistratsController::class, 'editar']);
$router->post('/user/registrats/editar', [RegistratsController::class, 'editar']);
$router->post('/user/registrats/eliminar', [RegistratsController::class, 'eliminar']);

$router->get('/user/opcions', [OpcionsController::class, 'index']);
$router->post('/user/opcions', [OpcionsController::class, 'index']);

// Activitats
$router->get('/user/activitats', [ActivitatsController::class, 'index']);
$router->get('/user/activitats/sala-habitacio', [ActivitatsController::class, 'habitacio']);
$router->get('/user/activitats/sala-jocs', [ActivitatsController::class, 'jocs']);
$router->get('/user/activitats/sala-lavabo', [ActivitatsController::class, 'lavabo']);
$router->get('/user/activitats/sala-sala_estar', [ActivitatsController::class, 'estar']);
$router->get('/user/activitats/sala-cuina', [ActivitatsController::class, 'cuina']);

$router->get('/user/activitats/sala-hort', [ActivitatsController::class, 'hort']);
$router->post('/user/activitats/sala-hort', [ActivitatsController::class, 'hort']);




$router->comprovarRutes();