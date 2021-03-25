<?php

namespace App\Classes\Controllers;
use App\Core\Classes\Template;

class Controller {

    public static $template;

    public function __construct()
    {
        self::$template = new Template();
    }

    public function view($template)
    {
        return self::$template->show($template);
    }
}