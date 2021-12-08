<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Users.loginGithub');
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        $login = Http::get(env('API_URL') . "login/github");
        return view('Users.loginGithub' , [
            'login' => $login
        ]);
    }
}