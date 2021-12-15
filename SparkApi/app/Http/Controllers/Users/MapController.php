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
        $cookie = $_COOKIE['access_token'];

        $http = new Http();
        $bikes = $http::withToken($cookie)->get(env('API_URL') . 'bikes');
        $cities = $http::withToken($cookie)->get(env('API_URL') . 'cities');
        $chargingstations = $http::withToken($cookie)->get(env('API_URL') . 'chargingstations');
        $parkingspaces = $http::withToken($cookie)->get(env('API_URL') . 'parkingspaces');
        $subscription = $http::withToken($cookie)->get(env('API_URL') . 'subscriptions');
        $currentBikeRide = $http::withToken($cookie)->get(env('API_URL') . 'bikehistory/user/active');
        // var_dump($bikes);

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
