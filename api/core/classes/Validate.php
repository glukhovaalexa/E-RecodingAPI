<?php

namespace Api\Core\Classes;
use Api\Core\Classes\Request;

class Validate {
    
    public $request;
    public $errors = [];
    public function __construct($rules, Request $request)
    {
        $this->request = $request;
        $this->validate($rules, $request);
    }

    public function validate($rules, $request)
    {
        foreach($rules as $attribute => $rules)
        {
            foreach($rules as $rule)
            {
                if(is_array($rule))
                {
                    // var_dump(mb_strlen($request->input($attribute)) > $rule[1]);
                    if($rule[0] === $request::MIN && mb_strlen($request->input($attribute)) < $rule[1])
                    {
                        $this->setError($attribute, $this->errors()[1]);
                    }
                }
                else{
                    if($rule === $request::REQUIRED && empty($request->input($attribute)))
                    {
                        $this->setError($attribute, $this->errors()[0]);
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
            1 => 'This field need to be longer then',
        ];
    }
}