<?php

namespace Api\Classes\Controllers;
use Api\Classes\Controllers\Controller;
use Api\Classes\Models\User;
use Api\Core\Classes\Request;
use Api\Classes\Requests\RegisterRequest;

class RegisterController extends Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->request->postMethod())
        {
            // request ruls for registration
            $this->request = new RegisterRequest();
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
     * handle sign up
     * 
     * return json
     */
    public function signup(Request $request)
    {
        $errors = $this->request->validate->errors;
        // if not path validateion
        if(!empty($errors))
        {
            $response = $this->response->json($errors, 400);
            echo $response;
            return;
        }
        
        // if data is valid
        $data = $this->request->input();
        $result = User::create($data);
        if($result)
        {
            $response = $this->response->json($result, 201);
            echo $response;
        }else{
            $response = $this->response->json([
                'status' => false,
                'message' => 'User wasn`t registed! Try later!'
            ], 404);
            echo $response;
        }
    }
}