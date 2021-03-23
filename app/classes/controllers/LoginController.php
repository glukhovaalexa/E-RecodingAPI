<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;

class LoginController extends Controller {

    public function index()
    {
        return $this->view('login');
    }
}