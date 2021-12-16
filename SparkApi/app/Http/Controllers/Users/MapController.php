<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
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
        $access_token = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $http = new Http();
        $bikes = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'bikes');
        $cities = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'cities');
        $chargingstations = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'chargingstations');
        $parkingspaces = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'parkingspaces');
        $subscription = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'subscriptions');
        $currentBikeRide = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'bikehistory/user/active');

        try {
            $renew = $http::put(env('API_URL') . 'subscriptions/renew/' . $subscription['id']);
        } catch (\Exception $e) {
            $renew = "";
        }

        return view('users.map', [
            "bikes" => $bikes,
            "cities" => $cities,
            "chargingstations" => $chargingstations,
            "parkingspaces" => $parkingspaces,
            'renew' => $renew,
            'currentBikeRide' => $currentBikeRide
        ]);
    }
}
