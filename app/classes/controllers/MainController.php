<?php

namespace App\Classes\Controllers;
use App\Classes\Controllers\Controller;

class MainController extends Controller {

    /**
     * get request
     * show home page
     */
    public function index()
    {
        return $this->view('home');
    }
}