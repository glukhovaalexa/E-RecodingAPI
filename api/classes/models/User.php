<?php

namespace Api\Classes\Models;

class User extends Model{
    public int $id;
    public string $name;
    public string $lastname;
    public int $city_id;
    public string $phone;
    protected string $email;
    protected string $pass;
    protected string $pass_rep;

    /**
     * relationship
     * 
     * return obj
     */
    public function city() : City
    {
        return $this->has(City::class, $this, 'city_id');
    }

    /**
     * auth user
     * 
     * !!!!!!!
     */
    public static function Auth()
    {
        return 1;
    }
}