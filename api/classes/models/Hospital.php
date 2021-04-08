<?php

namespace Api\Classes\Models;

class Hospital extends Model{
    public int $id;
    public string $name;
    public int $city_id;

    /**
     * relationship
     * 
     * return array
     */
    public function specialities() : array
    {
        return $this->hasMany(Speciality::class, $this, 'hospital_id');
    }
}