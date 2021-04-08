<?php

namespace Api\Classes\Controllers;
use Api\Classes\Controllers\Controller;
use Api\Core\Classes\Request;
use Api\Classes\Requests\LoginRequest;

class LoginController extends Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->request->postMethod())
        {
            $this->request = new LoginRequest();
        }
    }

    /**
     * 
     */
    public function index()
    {
        echo 'hi';
    }

    /**
     * post request
     * handle sign up
     */
    public function signin(Request $request)
    {
        ///
    }
}