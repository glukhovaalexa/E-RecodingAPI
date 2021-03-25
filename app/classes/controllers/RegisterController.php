<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;
use App\Core\Classes\DB\Db;
use App\Classes\Models\User;

class RegisterController extends Controller {

    public function index()
    {
        return $this->view('register');
    }

    public function signup()
    {
        var_dump($this->request->input());
        echo '<pre>';
        var_dump(User::getAll('users'));
        

    }
}