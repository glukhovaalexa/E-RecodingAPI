<?php

namespace Api\Classes\Controllers;
use Api\Classes\Controllers\Controller;

class RegisterController extends Controller {

    /**
     * 
     */
    public function index()
    {
        //
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