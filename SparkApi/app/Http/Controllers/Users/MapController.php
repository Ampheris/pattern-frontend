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
        $http = new Http();
        $bikes = $http::get(env('API_URL') . 'bikes');
        $cities = $http::get(env('API_URL') . 'cities');
        $chargingstations = $http::get(env('API_URL') . 'chargingstations');
        $parkingspaces = $http::get(env('API_URL') . 'parkingspaces');
        $subscription = $http::get(env('API_URL') . 'subscriptions/' . 1);
        $currentBikeRide = $http::get(env('API_URL') . 'bikehistory/user/active/' . 1);
        // var_dump($bikes);
        $bike = 0;
        //
        if (is_null(json_decode($currentBikeRide))) {
            $currentBikeRide = 0;
        } else {
            $bike = $http::get(env('API_URL') . 'bikes/' . $currentBikeRide['bike_id']);
        }

        try {
            $renew = $http::put(env('API_URL') . 'subscriptions/renew/' . $subscription['id']);
        } catch (\Exception $e) {
            $renew = "";
        }
        // var_dump($currentBikeRide);
        return view('users.map', [
            "bikes" => $bikes,
            "cities" => $cities,
            "chargingstations" => $chargingstations,
            "parkingspaces" => $parkingspaces,
            'renew' => $renew,
            'currentBikeRide' => $currentBikeRide,
            'bike' => $bike
        ]);
    }
}
