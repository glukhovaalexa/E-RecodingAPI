<?php

namespace Api\Classes\Requests;
use Api\Core\Classes\Request;
use Api\Core\Classes\Validate;

class RegisterRequest extends Request{

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
            'name' => ['required', ['min', '3']],
            'lastname' => ['required', ['min', '3']],
            'phone' => ['required', 'num'],
            'email' => ['required', 'email_valid', 'unique'],
            'pass' => ['required', ['min', '8'], ['match', 'pass_rep']],
        ];
    }
}