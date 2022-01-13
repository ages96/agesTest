<?php

namespace App\Http\Middleware;

use App;
use Closure;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->header("token")){
            return response()->json("forbiden", 401);
        }

        if ($request->header("token") != env("STATIC_TOKEN")){
            return response()->json("forbiden", 401);
        }

        return $next($request);
    }
}
