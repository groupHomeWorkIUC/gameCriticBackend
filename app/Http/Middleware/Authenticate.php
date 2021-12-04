<?php

namespace App\Http\Middleware;

use http\Env\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {

            if(strpos($request->url() ,'api') !== false){
                abort(response()->json('Unauthorized', 403));
            }
            else{
            return route('login-get');
            }
        }

    }
}
