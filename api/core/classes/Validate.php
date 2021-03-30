<?php

namespace Api\Core\Classes;
use Api\Core\Classes\Request;

class Validate {
    
    public $request;
    public function __construct($rules, Request $request)
    {
        $this->validate($rules, $request);
    }

    public function validate($rules, $request)
    {
        foreach($rules as $attribute => $rule)
        {
            var_dump($attribute, $rule);
            exit;
        }
    }
}