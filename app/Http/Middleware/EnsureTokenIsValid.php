<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $appKey = $request->header('S-TOKEN');
        
        if(strcmp($appKey, env('SOCCER_TOKEN','SoccerToken')) != 0) {
            $response = [
                'status'  => false,
                'data'    => null,
                'message' => "Invalid Api Key",
            ];

            return response()->json($response, 201);exit();
        } else {
            return $next($request);
        }
    }
}
