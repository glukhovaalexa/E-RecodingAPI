<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/routing.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


use App\Core\Classes\Router;


$router = new Router();
$router->run();