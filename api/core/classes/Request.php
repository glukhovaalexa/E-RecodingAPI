<?php

namespace Api\Core\Classes;
use Api\Core\Classes\Validate;

class Request{

    public $validate;

    /**
     * get path from url
     * 
     * return string
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'];
        
        $params = $this->getParams();
        $path = str_replace('?'.$params, '', $path);
        return $path;
    }

    /**
     * get params from url
     * 
     * return string
     */
    public function getParams()
    {
        $path = $_SERVER['REQUEST_URI'];
        if(array_key_exists('query', parse_url($path)))
        {
            return parse_url($path)['query'];
        }
        return '';
    }

    /**
     * show method
     * 
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
     * 
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
     * 
     * return array
     */
    public function input($attribute = '')
    {
        if($this->postMethod())
        {
            $post = json_decode(file_get_contents('php://input'), true);  
            if(!empty($attribute))
            {
                if(array_key_exists($attribute, $post))
                {
                    return $post[$attribute];
                }
            }
            return $post;
        }
        if(!empty($attribute))
            {
                if(array_key_exists($attribute, $_GET))
                {
                    return $_GET[$attribute];
                }
            }
        return $_GET;
        
    }

    public function rules()
    {
    }

}