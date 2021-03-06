<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    /** 
     * success response method.
     * 
     * @param array $result
     * @param string message
     * @param integer $statusCode
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $statusCode = 200)
    {
        $response = [
            'status' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, $statusCode);
    }


    /**
     * return error response.
     *
     * @param string message
     * @param integer $statusCode
     * @return \Illuminate\Http\Response
     */
    public function sendError($message, $statusCode = 200)
    {
        $response = [
            'status'  => false,
            'data'    => null,
            'message' => $message,
        ];

        return response()->json($response, $statusCode);
    }
}
