<?php

namespace App\Core\Classes;
use App\Core\Classes\Request;
use App\Classes\Controllers\MainController;

class Router {

    public static $routing = [];
    public $request;

    public function __construct()
    {
        $this->request = new Request();
        // $this->run();
    }

    public static function get($path, $controller)
    {
        self::$routing = [
            'GET' => [
                $path => $controller,
            ],   
        ];
    }

    public function run()
    {
        if($this->request->getMethod())
        {
            $path = $this->request->getPath();
            $action = self::$routing['GET'][$path];
            $action = $this->getAction($action);
            $class = $action[0];
            $method = $action[1];
        }

        return call_user_func([new $class, $method]);
    }

    public function getAction($action)
    {
        $action = explode('@', $action);
        return $action;
    }
    
}