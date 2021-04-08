<?php

namespace Api\Classes\Models;

class Reception extends Model{
    public int $id;
    public int $user_id;
    public int $doctor_id;
    public $date;

}