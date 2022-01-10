<?php

namespace App\Http\Middleware;

use Closure;

class AddHeader
{
    public function handle($request, Closure $next)
    {
        $request->headers->set('Api_Token', env(API_TOKEN));

        return $next($request);
    }
}
