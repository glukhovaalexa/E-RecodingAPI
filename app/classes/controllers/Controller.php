<?php

namespace App\Classes\Controllers;
use App\Core\Classes\Template;
use App\Core\Classes\Request;

class Controller {

    public static $template;
    public $request;

    public function __construct()
    {
        $this->request = new Request;
        self::$template = new Template();
    }

    public function view($template)
    {
        return self::$template->show($template);
    }

}