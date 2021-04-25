<?php

namespace Api\Classes\Models;

class User extends Model{
    public int $id;
    public string $name;
    public string $lastname;
    public int $city_id;
    public string $phone;
    public string $email;
    public string $pass;
    public string $pass_rep;

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
    public static function auth()
    {
        return $_SESSION['auth'];
    }
}