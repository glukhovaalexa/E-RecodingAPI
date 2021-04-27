<?php

namespace Api\Classes\Controllers;
use Api\Core\Classes\Request;

use Api\Classes\Models\User;
use Api\Classes\Models\City;
use Api\Classes\Models\Hospital;
use Api\Classes\Models\Speciality;
use Api\Classes\Models\Doctor;

class ProfileController extends Controller {

    /**
     * get all cities, hospitals, specialities
     * 
     * return json
     */
    public function index()
    {
        $cities = City::getAll();
        $hospitals = Hospital::getAll();
        $specialities = Speciality::getAll();
        $response = $this->response->json([
            'cities' => $cities,
            'hospitals' => $hospitals,
            'specialities' => $specialities
        ], 200);
        echo $response;
    }

    /**
     * handle search form 
     * get doctors depend on citiy, hospital, speciality
     * 
     * return json
     */
    public function search(Request $request)
    {
        $doctors = Doctor::findMany($request->input());
        if($doctors)
        {
            $response = $this->response->json($doctors, 200);
            echo $response;
        }else{
            $response = $this->response->json([
                'status' => false,
                'message' => 'Not found!'
            ], 404);
            echo $response;
        }

    }

    public function logout() 
    {
        unset($_SESSION['auth']);
        $response = $this->response->json([
            'status' => true,
            'message' => 'Logout'
        ], 404);
        echo $response;
    }
}