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
        // $erros = $this->request->validate->errors;
        // if(!empty($erros))
        // {
        //     $response = $this->response->json($erros, 400);
        //     echo $response;
        //     return;
        // }
        
        // $data = $this->request->input();
        // $result = User::insert($data);
        // if($result)
        // {
        //     $response = $this->response->json($result, 201);
        //     echo $response;
        // }else{
        //     $response = $this->response->json([
        //         'status' => false,
        //         'message' => 'User wasn`t registed! Try later!'
        //     ], 201);
        //     echo $response;
        // }
    }
}