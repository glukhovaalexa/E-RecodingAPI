<?php

namespace Api\Classes\Models;

class Doctor extends Model{
    public int $id;
    public string $name;
    public string $lastname;
    public int $hospital_id;
    public int $city_id;
    public int $speciality_id;
    public string $roomNumber;

    /**
     * relationship
     * 
     * return obj
     */
    public function speciality() : Speciality
    {
        return $this->has(Speciality::class, $this, 'speciality_id');
    }

    /**
     * relationship
     * 
     * return obj
     */
    public function hospital() : Hospital
    {
        return $this->has(Hospital::class, $this, 'hospital_id');
    }

    /**
     * relationship
     * 
     * return obj
     */
    public function city() : City
    {
        return $this->has(City::class, $this, 'city_id');
    }

    public function related()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'hospital_id' => $this->hospital_id,
            'speciality_id' => $this->speciality_id,
            'city_id' => $this->city_id,
            'roomNumber' => $this->roomNumber,
            'speciality' => $this->speciality(),
            'hospital' => $this->hospital(),
            'city' => $this->city(),
        ];

    }
}