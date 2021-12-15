<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\RedirectResponse;
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
        return view('auth.login');
    }

    public function loginGithub(): RedirectResponse
    {
        return redirect(env('API_URL') . 'login/github');
    }
}
