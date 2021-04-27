<?php

namespace Api\Classes\Controllers;
use Api\Classes\Controllers\Controller;
use Api\Classes\Models\User;
use Api\Classes\Models\City;
use Api\Core\Classes\Request;
use Api\Classes\Requests\RegisterRequest;
use Api\Core\Traits\HashPassword;

class RegisterController extends Controller{
    
    use HashPassword;

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
     * get request
     * register form (get cities)
     * 
     * return json
     */
    public function index()
    {
        $cities = City::getAll();
        echo $this->response->json($cities, 200);
        return;
    }

    /**
     * handle sign up
     * 
     * return json
     */
    public function signup(Request $request)
    {
        $errors = $this->request->validate->errors;
        // if not path validation
        if(!empty($errors))
        {
            $response = $this->response->json($errors, 200);
            echo $response;
            return;
        }
        // if data is valid
        $data = $this->request->input();
        $data['pass'] = $this->hash($data['pass']);
        unset($data['pass_rep']);
        $result = User::create($data);
        if($result)
        {
            $_SESSION['auth'] = $result[0]['id'];
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