<?php

namespace Api\Classes\Requests;
use Api\Core\Classes\Request;
use Api\Core\Classes\Validate;

class RegisterRequest extends Request{

    public const REQUIRED = 'required';
    public const MIN = 'min';
    public const MATCH = 'match';
    public const NUM = 'num';
    public const EMAIL_VALID = 'email_valid';

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
            'email' => ['required', 'email_valid'],
            'pass' => ['required', ['match', 'pass_rep']],
        ];
    }
}