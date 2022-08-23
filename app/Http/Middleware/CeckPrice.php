<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CeckPrice
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
          
       echo 'middleware test <br>';

        return $next($request);
    }
}
