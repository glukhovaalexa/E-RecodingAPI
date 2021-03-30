<?php

namespace Api\Classes\Controllers;
use Api\Classes\Controllers\Controller;
use Api\Core\Classes\DB\Db;
use Api\Classes\Models\User;
use Api\Core\Classes\Validate;
use Api\Classes\Requests\RegisterRequest;

class RegisterController extends Controller {

    public $request;
    public function __construct()
    {
        $this->request = new RegisterRequest();
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
    public function signup()
    {
        $data = $this->request->input();
        var_dump($data);
        exit;
        
        $result = User::insert('users', $data);
        if($result)
        {
            $response = $this->response->json($result, 201);
            echo $response;
        }else{
            $response = $this->response->json([
                'status' => false,
                'message' => 'User wasn`t registed! Try later!'
            ], 201);
            echo $response;
        }
    }
}