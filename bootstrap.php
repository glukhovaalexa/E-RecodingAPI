<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/routing.php';

echo __LINE__;
use App\Core\Classes\Router;

var_dump(Router::$routing);
$obj = new Router();

echo $obj->run();