<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
    * Generic action to perform actions based on endpoints and metthods passed in parammeters
    *
    * @param string $endPoint
    * @param string $method
    * @param array $params
    * @param string $header
    * @return \Illuminate\Http\Response
    */
    public function getData($endPoint, $method, $params = null, $header = null)
    {   
        $request = Request::create($endPoint, $method, $params);

        if($header) {
            $request->headers->set('S-TOKEN', env('SOCCER_TOKEN'));    
        }

        $response = Route::dispatch($request);

        return $response->getOriginalContent();
    }
}
