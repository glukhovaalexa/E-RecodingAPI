<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;

class RegisterController extends Controller {

    public function index()
    {
        return $this->view('login');
    }

    public function signin()
    {
        var_dump($this->request->input());
    }
}