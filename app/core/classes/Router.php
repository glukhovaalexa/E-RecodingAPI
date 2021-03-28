<?php

namespace App\Core\Classes;
use App\Core\Classes\Request;
use App\Classes\Controllers\MainController;
use App\Classes\Controllers\Controller;

class Router {

    public static $routing = [];
    public $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->controller = new Controller();
    }

    /**
     * add to array path and action
     */
    public static function get($path, $controller)
    {
        self::$routing['GET'][$path] = $controller;
    }

    /**
     * add to array path and action
     */
    public static function post($path, $controller)
    {
        self::$routing['POST'][$path] = $controller;
    }

    /**
     * connect action
     */
    public function run()
    {
        if($this->request->getMethod())
        {
            $path = $this->request->getPath();
            $action = self::$routing['GET'][$path];
            if(!$action)
            {
                return $this->controller->view('404');
            }
        }
        if($this->request->postMethod())
        {
            $path = $this->request->getPath();
            $action = self::$routing['POST'][$path];
            if(!$action)
            {
                return $this->controller->view('404');
            }
        }
        $action = $this->getAction($action);
        $class = $action[0];
        $method = $action[1];

        return call_user_func([new $class, $method]);
    }

    /**
     * get action
     */
    public function getAction($action)
    {
        $action = explode('@', $action);
        return $action;
    }
    
}