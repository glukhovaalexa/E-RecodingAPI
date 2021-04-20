<?php

namespace Api\Classes\Controllers;
use Api\Core\Classes\Request;
use Api\Classes\Models\Reception;
use Api\Classes\Models\User;

class ReceptionController extends Controller {

    /**
     * get all receptions
     * 
     * return json
     */
    public function index()
    {
        $receptions = Reception::find(['user_id' => User::Auth()]); //array
        if($receptions)
        {
            $result = [];
            foreach($receptions as $reception)
            {
                $result[] = $reception->related();
            }
            $response = $this->response->json($result, 201);
            echo $response;
        }else{
            $response = $this->response->json([
                'status' => false,
                'message' => 'Try later!'
            ], 404);
            echo $response;
        }
    }

    /**
     * get one reception
     * 
     * return json
     */
    public function show(Request $request, $id)
    {
        $reception = Reception::getOne($id);
        if($reception)
        {
            $response = $this->response->json($reception->related(), 201);
            echo $response;
        }else{
            $response = $this->response->json([
                'status' => false,
                'message' => 'Not found!'
            ], 404);
            echo $response;
        }
    }

    /**
     * store reception
     * 
     * return json
     */
    public function store(Request $request)
    {
        $result = Reception::create($request->input());
        if($result)
        {
            $response = $this->response->json($result, 201);
            echo $response;
        }else{
            $response = $this->response->json([
                'status' => false,
                'message' => 'Try later!'
            ], 404);
            echo $response;
        }
    }

    /**
     * edit reception
     * 
     * return json
     */
    public function edit(Request $request)
    {
        $result = Reception::update($request->input());
        if($result)
        {
            $response = $this->response->json($result, 200);
            echo $response;
        }else{
            $response = $this->response->json([
                'status' => false,
                'message' => 'Not found!'
            ], 404);
            echo $response;
        }
    }

    /**
     * delete receprion
     * 
     * return json
     */
    public function delete(Request $request, $id)
    {
        $result = Reception::delete($id);
        if($result)
        {
            $response = $this->response->json($result, 200);
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