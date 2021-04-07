<?php

namespace Api\Classes\Controllers;
use Api\Classes\Models\User;
use Api\Classes\Models\City;

class ProfileController extends Controller {

    /**
     * get request
     * show home page
     */
    public function index()
    {
        $cities = City::getAll();
        $response = $this->response->json($cities, 201);
        echo $response;
    }
}