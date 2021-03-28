<?php

namespace Api\Core\Classes;

class Response {

    /**
     * transform data into json
     */
    public function json($data, $status)
    {
        http_response_code($status);
        return json_encode($data);
    }

}