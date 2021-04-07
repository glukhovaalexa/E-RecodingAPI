<?php

namespace Api\Classes\Controllers;
use Api\Core\Classes\Request;
use Api\Core\Classes\Response;

class Controller {

    public $request;
    public $response;

    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
    }

}