<?php

namespace Api\Classes\Models;

class User extends Model{
    public int $id;
    private string $name;
    private string $lastname;
    public int $city_id;
    private string $phone;
    private string $email;
    private string $pass;
    private string $pass_rep;

    public function city()
    {
        return $this->has(City::class, $this, 'city_id');
    }
}