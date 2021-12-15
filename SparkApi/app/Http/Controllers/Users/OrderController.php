<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $http = new Http();
        $orders = $http::withToken($cookie)->get(env('API_URL') . 'orders/user');

        $orders = json_decode($orders, true);
        return view('users.orders', [
            "orders" => $orders
        ]);
    }

    public function showSingleOrder($orderId)
    {
        $cookie = $_COOKIE['access_token'];
        $http = new Http();
        $order = $http::withToken($cookie)->get(env('API_URL') . 'orders/' . $orderId);
        $order = json_decode($order, true);
        return view('users.singleOrder', [
            "order" => $order
        ]);
    }
}
