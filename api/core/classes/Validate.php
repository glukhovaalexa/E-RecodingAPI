<?php

namespace Api\Core\Classes;
use Api\Core\Classes\Request;

class Validate {
    
    public $request;
    public $errors = [];
    public function __construct($rules, Request $request)
    {
        $this->request = $request;
        $this->validate($rules, $this->request);
    }

    public function validate($rules, $request)
    {
        foreach($rules as $attribute => $rules)
        {
            foreach($rules as $rule)
            {
                if(is_array($rule))
                {
                    if($rule[0] === $request::MIN && mb_strlen($request->input($attribute)) < $rule[1])
                    {
                        $this->setError($attribute, $this->errors()[1]);
                    }
                    if($rule[0] === $request::MATCH && $request->input($attribute) !== $request->input($rule[1]))
                    {
                        $this->setError($attribute, $this->errors()[4]);
                    }
                }
                else{
                    if($rule === $request::REQUIRED && empty($request->input($attribute)))
                    {
                        $this->setError($attribute, $this->errors()[0]);
                    }
                    if($rule === $request::NUM && !is_numeric($request->input($attribute)))
                    {
                        $this->setError($attribute, $this->errors()[2]);
                    }
                    if($rule === $request::EMAIL_VALID && !filter_var($request->input($attribute), FILTER_VALIDATE_EMAIL))
                    {
                        $this->setError($attribute, $this->errors()[3]);
                    }
                }
            }
        }
    }

    protected function setError($attribute, $message)
    {
        $this->errors['errors'][$attribute] = $message;
    }

    protected function errors()
    {
        return [
            0 => 'This field is required',
            1 => 'This field need to be longer then 3',
            2 => 'This field shouldn`t have letters',
            3 => 'Email isn`t valid',
            4 => 'Passes don`t match',
        ];
    }
}