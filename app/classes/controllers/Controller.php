<?php

namespace App\Classes\Controllers;
use App\Core\Classes\Request;
use App\Core\Classes\Response;

class Controller {

    public static $template;
    public $request;
    public $response;

    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
    }

}