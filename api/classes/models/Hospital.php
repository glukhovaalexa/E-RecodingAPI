<?php

namespace Api\Classes\Models;

class Hospital extends Model{
    public int $id;
    public string $name;
    public int $city_id;

    public function city($class)
    {
        return $this->has($class, $this, 'city_id');
    }
}