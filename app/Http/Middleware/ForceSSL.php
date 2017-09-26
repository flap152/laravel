<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceSSL
{

    public function handle(Request  $request, Closure $next)
    {


        if (!$request->secure()) {
            return redirect()->secure($request->getRequestUri(),301);
        }

        return $next($request);
    }
}