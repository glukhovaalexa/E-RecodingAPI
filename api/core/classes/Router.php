<?php

namespace Api\Core\Classes;
use Api\Core\Classes\Request;
use Api\Core\Classes\Response;

use Api\Classes\Controllers\MainController;
use Api\Classes\Controllers\Controller;

class Router {

    public static $routing = [];
    public $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
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
     * add to array path and action
     */
    public static function delete($path, $controller)
    {
        self::$routing['DELETE'][$path] = $controller;
    }

        /**
     * add to array path and action
     */
    public static function put($path, $controller)
    {
        self::$routing['PUT'][$path] = $controller;
    }

    /**
     * connect action
     */
    public function run()
    {
        $path = $this->request->getPath();
        $params = $this->request->getParams();

        if($params)
        {
            $position = strripos($params, '='); 
            $key = mb_substr($params, 0, $position); 
            $position2 = strripos($params, '/');
            $key2 = ''; 
            if($position2)
            {
                $key2 = mb_substr($params, $position2, strlen($params) - 1); 
            }
            $path = "$path/{{$key}}$key2";
        }

        if($this->request->getMethod())
        {
            if(!array_key_exists($path, self::$routing['GET']))
            {
                echo $this->response->json([
                    'status' => false,
                    'message' => 'Undefined route'
                ], 404);
                return;
            }
            $action = self::$routing['GET'][$path];
        }

        if($this->request->postMethod())
        {
            $action = self::$routing['POST'][$path];
            if(!$action)
            {
                return $this->controller->view('404');
            }
        }

        if($this->request->putMethod())
        {
            if(!array_key_exists($path, self::$routing['PUT']))
            {
                echo $this->response->json([
                    'status' => false,
                    'message' => 'Undefined route'
                ], 404);
                return;
            }
            $action = self::$routing['PUT'][$path];
        }

        if($this->request->deleteMethod())
        {
            if(!array_key_exists($path, self::$routing['DELETE']))
            {
                echo $this->response->json([
                    'status' => false,
                    'message' => 'Undefined route'
                ], 404);
                return;
            }
            $action = self::$routing['DELETE'][$path];
        }

        $action = $this->getAction($action);
        $class = $action[0];
        $method = $action[1];
        return call_user_func([new $class, $method], $this->request, $this->request->input('id') ?? null);
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