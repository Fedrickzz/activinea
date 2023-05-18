<?php 

use Dotenv\Dotenv;
use Model\Middleware;
require __DIR__ . '/../vendor/autoload.php';

// Afegir Dotenv
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funcions.php';
require 'database.php';

// Connectar a la base de dades
Middleware::setDB($db);