<?php

namespace Api\Classes\Models;

use Api\Classes\Models\User;
use Api\Classes\Models\Doctor;

class Reception extends Model{
    public int $id;
    public int $user_id;
    public int $doctor_id;
    public $date;

    /**
     * relationship
     * 
     * return obj
     */
    public function user() : User
    {
        return $this->has(User::class, $this, 'user_id');
    }

    /**
     * relationship
     * 
     * return obj
     */
    public function doctor() : Doctor
    {
        return $this->has(Doctor::class, $this, 'doctor_id');
    }

    public function related()
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'doctor_id' => $this->doctor_id,
            'date' => $this->date,
            'user' => $this->user(),
            'doctor' => $this->doctor(),
        ];

    }
}