<?php

namespace Api\Classes\Models;

class Doctor extends Model{
    public int $id;
    public string $name;
    public string $lastname;
    public int $hospital_id;
    public int $speciality_id;
    public string $roomNumber;
}