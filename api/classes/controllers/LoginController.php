<?php

namespace Api\Classes\Controllers;
use Api\Classes\Controllers\Controller;
use Api\Core\Classes\Request;
use Api\Classes\Requests\LoginRequest;
use Api\Classes\Models\User;
use Api\Core\Traits\HashMatches;

class LoginController extends Controller {

    use HashMatches;

    public function __construct()
    {
        parent::__construct();
        if($this->request->postMethod())
        {
            // request ruls for login
            $this->request = new LoginRequest();
        }
    }

    /**
     * 
     */
    public function index()
    {
        //
    }

    /**
     * post request
     * handle sign up
     */
    public function signin(Request $request)
    {
        $errors = $this->request->validate->errors;
        // if didn`t path the validation
        if(!empty($errors))
        {
            $response = $this->response->json($errors, 200);
            echo $response;
            return;
        }
        // if data is valid
        $email = $this->request->input('email');
        $pass = $this->request->input('pass');
        $user = User::find(['email' => $email]);
        echo $this->response->json([
            'status' => true,
            'message' => 'You are login',
            'user' => $user[0]
        ], 200);
        return;
    }
}