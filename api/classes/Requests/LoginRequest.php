<?php

namespace Api\Classes\Requests;
use Api\Core\Classes\Request;
use Api\Core\Classes\Validate;

class RegisterRequest extends Request{

    public const REQUIRED = 'required';
    public const MIN = 'min';

    public function __construct()
    {
        $this->validate = new Validate($this->rules(), $this);
    }

    public function rules()
    {
        $parent = parent::rules();
        return [
            'name' => ['required', ['min', '3']],
            'lastname' => ['required', ['min', '3']],
        ];
    }
}