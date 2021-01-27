<?php

namespace App\Http\Controllers\Api;

trait ApiResponseTrait
{

    public $paginateNumber = 10;

    /***
     * 
     * data 
     * status 
     * message
     */

    public function apiResponse($data, $status = 200, $message = null)
    {

        $array = [
            'data' => $data,
            'status' => in_array($status, $this->successStatusCode()) ? true : false,
            'message' => $message
        ];

        return response($array, $status);
    }

    // success status code (2XX success) 200, 201 and 202
    public function successStatusCode()
    {
        return [200, 201, 202];
    }

    //not found method 
    public function notFoundResponse()
    {
        return $this->apiResponse(null, 404, 'Not Found');
    }

    //Unknown Error 
    public function unknownError()
    {
        return $this->apiResponse(null, 400, 'unknown error');
    }
}
