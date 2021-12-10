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
        $http = new Http();
        $orders = $http::get(env('API_URL') . 'orders/user/' . '1');

        $orders = json_decode($orders, true);
        return view('users.orders', [
            "orders" => $orders
        ]);
    }

    public function showSingleOrder($orderId)
    {
        $http = new Http();
        $order = $http::get(env('API_URL') . 'orders/' . $orderId);
        $order = json_decode($order, true);
        return view('users.singleOrder', [
            "order" => $order
        ]);
    }
}
