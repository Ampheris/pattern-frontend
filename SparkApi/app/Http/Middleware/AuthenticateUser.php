<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateUser
{
    public function handle($request, Closure $next)
    {
        // var_dump($request);
        $response = $next($request);

        // var_dump($response);
        if ($response->status() == 401) {
            return redirect()->route('login');
        }

        try {
            $role = $_COOKIE['role'];
            $access_token = $_COOKIE['access_token'];
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        if ($role != 'user') {
            return redirect()->route('login');
        }

        return $response;
    }
}
