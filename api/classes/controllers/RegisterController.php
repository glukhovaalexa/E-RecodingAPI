<?php

namespace Api\Classes\Controllers;
use Api\Classes\Controllers\Controller;
use Api\Core\Classes\DB\Db;
use Api\Classes\Models\User;

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
     * handle sign up
     */
    public function signup()
    {
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