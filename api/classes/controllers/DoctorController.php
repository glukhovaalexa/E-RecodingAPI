<?php

namespace Api\Classes\Controllers;
use Api\Core\Classes\Request;
use Api\Classes\Models\Doctor;

class DoctorController extends Controller {

    /**
     * get all doctors
     * 
     * return json
     */
    public function index()
    {
        $doctors = Doctor::getAll();
        $response = $this->response->json($doctors, 200);
        echo $response;
    }

        /**
     * get all doctors
     * 
     * return json
     */
    public function someDoctors(Request $response, $city_id)
    {
        $doctors = Doctor::getMany('city_id', $city_id);
        if($doctors)
        {
            $result = [];
            foreach($doctors as $doctor)
            {
                $result[] = $doctor->related();
            }
        }
        $response = $this->response->json($result, 200);
        echo $response;
    }

    /**
     * get one doctor
     * 
     * return json
     */
    public function show(Request $response, $id)
    {
        $doctors = Doctor::getOne($id);
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

}