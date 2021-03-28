<?php

namespace App\Core\Classes;

class Request {

    /**
     * get path from url
     */
    public function getPath()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * show method
     * return bool
     */
    public function getMethod()
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            return true;
        }

        return false;
    }

    /**
     * show method
     * return bool
     */
    public function postMethod()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            return true;
        }

        return false;
    }

    /**
     * get data
     * return array
     */
    public function input()
    {
        return $_POST;
    }

}