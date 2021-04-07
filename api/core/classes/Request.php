<?php

namespace Api\Core\Classes;
use Api\Core\Classes\Validate;

class Request{

    public $validate;
    // public function __construct()
    // {

    //     // $this->validate = new Validate($this->rules());
    // }

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
    public function input($attribute = '')
    {
        if(!empty($attribute))
        {
            return $_POST[$attribute];
        }
        return $_POST;
    }

    public function rules()
    {
    }

}