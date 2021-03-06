<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class OrderController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cookie = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $http = new Http();
        $orders = $http::withToken($cookie)->withHeaders($headers)->get(env('API_URL') . 'orders/user');
        $orders = json_decode($orders, true);

        foreach ($orders as $key => $value) {
            $date = Carbon::parse($value['created_at'])->format('Y-d-m');
            $orders[$key]['date'] = $date;
        }

        return view('users.orders', [
            "orders" => $orders
        ]);
    }
}
