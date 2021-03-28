<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;
use App\Core\Classes\DB\Db;
use App\Classes\Models\User;

class RegisterController extends Controller {

    /**
     * get request
     * show register page
     */
    public function index()
    {
        return $this->view('register');
    }

    /**
     * post request
     * handle sign up
     */
    public function signup()
    {
        $data = $this->request->input();
        User::insert('users', $data);
        echo 'profile';
    }
}