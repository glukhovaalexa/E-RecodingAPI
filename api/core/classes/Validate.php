<?php

namespace Api\Core\Classes;
use Api\Core\Classes\Request;
use Api\Classes\Models\User;
use Api\Core\Traits\HashMatches;

class Validate {

    use HashMatches;
    
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
                        $this->setError($attribute, $this->errors($rule[1])[1]);
                    }
                    if($rule[0] === $request::MATCH && $request->input($attribute) !== $request->input($rule[1]))
                    {
                        $this->setError($attribute, $this->errors()[4]);
                    }
                    if($rule[0] === $request::HASH_MATCH &&  !$this->hashMatches($request->input($attribute), User::find(['email' => $request->input('email')])[0]->pass))
                    {
                        $this->setError($attribute, $this->errors()[6]);
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
                    if($rule === $request::UNIQUE && !empty(User::find([$attribute => $this->request->input($attribute)])))
                    {
                        $this->setError($attribute, $this->errors()[5]);
                    }
                }
            }
        }
    }

    protected function setError($attribute, $message)
    {
        $this->errors['errors'][$attribute] = $message;
    }

    protected function errors($var = '')
    {
        return [
            0 => 'This field is required',
            1 => "This field need to be longer then $var",
            2 => 'This field shouldn`t have letters',
            3 => 'Email isn`t valid',
            4 => 'Passes don`t match',
            5 => "Field $var isn`t unique",
            6 => "Login or passqord isn`t correct!",
        ];
    }
}