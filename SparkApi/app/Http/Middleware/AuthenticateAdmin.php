<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAdmin
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        var_dump($response->status());
        if ($response->status() == 401) {
            return redirect()->route('login');
        }

        try {
            $role = $_COOKIE['role'];
            $access_token = $_COOKIE['access_token'];
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        if ($role != 'admin') {
            return redirect()->route('login');
        }

        return $response;
    }
}
