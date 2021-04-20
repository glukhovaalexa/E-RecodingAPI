<?php

namespace Api\Core\Traits;

trait HashMatches {
    
    public function hashMatches(string $pass, string $hash) : bool
    {
        return password_verify ($pass, $hash);
    }
}