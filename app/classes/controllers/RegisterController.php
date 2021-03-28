<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;
use App\Core\Classes\DB\Db;
use App\Classes\Models\User;

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