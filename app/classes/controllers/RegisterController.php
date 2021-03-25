<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;
use App\Core\Classes\DB\Db;
 
class RegisterController extends Controller {

    public function index()
    {
        return $this->view('register');
    }

    public function signup()
    {
        var_dump($this->request->input());
        $obj = new Db;
        var_dump($obj->dbh);

    }
}