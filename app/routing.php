<?php

use App\Core\Classes\Router;

Router::get('/', 'App\Classes\Controllers\MainController@index');
Router::get('/signin', 'App\Classes\Controllers\LoginController@index');