<?php

use Api\Core\Classes\Router;

Router::get('/', 'Api\Classes\Controllers\MainController@index');

Router::get('/signup', 'Api\Classes\Controllers\RegisterController@index');
Router::post('/signup', 'Api\Classes\Controllers\RegisterController@signup');
Router::get('/signin', 'Api\Classes\Controllers\LoginController@index');
Router::post('/signin', 'Api\Classes\Controllers\LoginController@signin');

Router::get('/profile', 'Api\Classes\Controllers\ProfileController@index');
Router::post('/profile', 'Api\Classes\Controllers\ProfileController@search');
Router::post('/logout', 'Api\Classes\Controllers\ProfileController@logout');

Router::get('/doctors', 'Api\Classes\Controllers\DoctorController@index');
Router::get('/doctors/{id}', 'Api\Classes\Controllers\DoctorController@someDoctors');
Router::get('/doctor/{id}', 'Api\Classes\Controllers\DoctorController@show');

///crud operations
Router::get('/receptions/{id}', 'Api\Classes\Controllers\ReceptionController@index');
Router::post('/reception', 'Api\Classes\Controllers\ReceptionController@store');
Router::get('/reception/{id}', 'Api\Classes\Controllers\ReceptionController@show');
Router::put('/reception/{id}', 'Api\Classes\Controllers\ReceptionController@edit');
Router::delete('/reception/{id}', 'Api\Classes\Controllers\ReceptionController@delete');