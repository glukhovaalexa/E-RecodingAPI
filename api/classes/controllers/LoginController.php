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
        // if not path validateion
        if(!empty($errors))
        {
            $response = $this->response->json($errors, 200);
            echo $response;
            return;
        }
        // if data is valida
        $email = $this->request->input('email');
        $pass = $this->request->input('pass');
        $user = User::find(['email' => $email]);
        if(!empty($user))
        {
            if($this->hashMatches($pass, $user[0]->pass)) 
            {
                echo $this->response->json([
                    'status' => true,
                    'message' => 'You are login',
                    'user' => $user[0]
                ], 200);
                return;
            }
            
            $_SESSION['auth'] = $user[0]->id;
            $response = $this->response->json([
                'status' => false,
                'errors' => [
                    'message' =>  'Login or passqord isn`t correct!'
                ]
            ], 200);
            echo $response;
            return;
        }

        echo $this->response->json([
            'errors' => [
                'message' => 'User not found, please sign up!'
            ] 
        ], 200);
        return;

    }
}