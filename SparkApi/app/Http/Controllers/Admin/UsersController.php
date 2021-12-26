<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $http = new Http();
        $users = $http::get(env('API_URL') . 'users');
        $users = json_decode($users, true);
        return view('admin.users', [
            "users" => $users,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @return \Illuminate\Contracts\View\View
     */
    public function showSingleUser($userId)
    {
        $access_token = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $http = new Http();
        $user = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'users/' . $userId);
        $user = json_decode($user, true);
        return view('admin.showSingleUser', [
            "user" => $user,
        ]);
    }
}
