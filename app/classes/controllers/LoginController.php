<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;

class RegisterController extends Controller {

    /**
     * get request
     * show login page
     */
    public function index()
    {
        return $this->view('login');
    }

    /**
     * post request
     * handle sign in
     */
    public function signin()
    {
        var_dump($this->request->input());
    }
}