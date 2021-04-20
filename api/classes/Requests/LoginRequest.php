<?php

namespace Api\Classes\Requests;
use Api\Core\Classes\Request;
use Api\Core\Classes\Validate;

class LoginRequest extends Request{

    public function __construct()
    {
        //init Validate
        $this->validate = new Validate($this->rules(), $this);
    }

    /**
    * request ruls
    *
    * return array
    */
    public function rules()
    {
        $parent = parent::rules();
        return [
            'email' => ['required', 'email_valid'],
            'pass' => ['required'],
        ];
    }
}