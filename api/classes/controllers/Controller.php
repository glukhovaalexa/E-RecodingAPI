<?php

namespace Api\Classes\Controllers;
// use Api\Core\Classes\Request;
use Api\Core\Classes\Response;
// use Api\Core\Classes\Validate;

class Controller {

    // public $request;
    public $response;
    public $validate;

    public function __construct()
    {
        // $this->request = new Request;
        $this->response = new Response;
        // $this->validate = new Validate;
    }

}