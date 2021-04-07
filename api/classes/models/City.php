<?php

namespace Api\Classes\Models;

class City extends Model{
    public int $id;
    public string $name;

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, $this, 'city_id');
    }
}