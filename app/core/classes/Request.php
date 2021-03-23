<?php

namespace App\Core\Classes;

class Request {

    public $path;
    public $method;
    public $params;

    public function getPath()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getMethod()
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            return true;
        }

        return false;
    }

    public function postMethod()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            return true;
        }

        return false;
    }

}