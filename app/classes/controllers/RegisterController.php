<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;

class RegisterController extends Controller {

    public function index()
    {
        return $this->view('register');
    }

    public function signup()
    {
        var_dump($this->request->input());
    }
}