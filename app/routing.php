<?php

use App\Core\Classes\Router;

Router::get('/', 'App\Classes\Controllers\MainController@index');
Router::get('/signup', 'App\Classes\Controllers\RegisterController@index');
Router::post('/signup', 'App\Classes\Controllers\RegisterController@signup');
Router::get('/signin', 'App\Classes\Controllers\LoginController@index');
Router::post('/signin', 'App\Classes\Controllers\LoginController@signin');

