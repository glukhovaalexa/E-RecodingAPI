<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;

class MainController extends Controller {

    public function index()
    {
        return $this->view('home');
    }
}