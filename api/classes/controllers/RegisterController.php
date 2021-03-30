<?php

namespace Api\Classes\Controllers;
use Api\Classes\Controllers\Controller;
use Api\Core\Classes\DB\Db;
use Api\Classes\Models\User;
use Api\Core\Classes\Validate;
use Api\Core\Classes\Request;
use Api\Classes\Requests\RegisterRequest;

class RegisterController extends Controller{

    // public $request;
    // public function __construct()
    // {
    //     $this->request = new RegisterRequest();
    // }
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
    public function signup(Request $request)
    {
        var_dump($request);
        exit;
        $data = $this->request->input();
        

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