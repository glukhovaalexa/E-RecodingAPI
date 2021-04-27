<?php

namespace Api\Classes\Models;

class City extends Model{
    public int $id;
    public string $name;

    /**
     * relationship
     * 
     * return array
     */
    public function hospitals() : array
    {
        return $this->belongsToMany(Hospital::class, $this, 'city_id');
    }

    public function related()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'hospitals' => $this->hospitals()
        ];

    }
}