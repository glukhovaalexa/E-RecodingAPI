<?php

use Api\Core\Classes\Router;

Router::get('/', 'Api\Classes\Controllers\MainController@index');
Router::get('/signup', 'Api\Classes\Controllers\RegisterController@index');
Router::post('/signup', 'Api\Classes\Controllers\RegisterController@signup');
Router::get('/signin', 'Api\Classes\Controllers\LoginController@index');
Router::post('/signin', 'Api\Classes\Controllers\LoginController@signin');

