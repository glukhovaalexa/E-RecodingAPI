<?php

namespace Api\Core\Traits;

trait HashPassword {
    
    public function hash($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }
}