<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *, Authorization');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

session_start();

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/api/routing.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Api\Core\Classes\Router;

$router = new Router();
$router->run();