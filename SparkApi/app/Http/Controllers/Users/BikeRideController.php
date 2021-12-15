<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BikeRideController extends Controller
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

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function index(Request $request, $bikeId)
    // {
    //     $http = new Http();
    //     $bike = $http::get(env('API_URL') . 'bikes/' . $bikeId);
    //
    //     return view('users.bikeride', [
    //         "bike" => $bike
    //     ]);
    // }

    public function index(Request $request, $bikerideId)
    {
        $cookie = $_COOKIE['access_token'];
        $http = new Http();
        $bikeride = $http::withToken($cookie)->get(env('API_URL') . 'bikehistory/' . $bikerideId);

        $bikeride = json_decode($bikeride, true);
        return view('users.bikeride', [
            "bikeride" => $bikeride[0]
        ]);
    }

    public function startBikeRide($bikeId)
    {
        $cookie = $_COOKIE['access_token'];
        $http = new Http();
        $bike = $http::withToken($cookie)->get(env('API_URL') . 'bikes/' . $bikeId);

        $http::withToken($cookie)->get(env('API_URL') . 'bikehistory/start?bike_id=' . $bikeId );
        return redirect()->route('map');
    }

    public function stopBikeRide()
    {
        $cookie = $_COOKIE['access_token'];
        $http = new Http();
        $bikeRide = $http::withToken($cookie)->get(env('API_URL') . 'bikehistory/stop');

        if (isset($bikeRide['message'])) {
            $message = $bikeRide['message'];
            return redirect()->route('addToBalance', ['message' => $message]);
        }
        // $message  = null;
        return redirect()->route('bikeride', $bikeRide['id']);
    }
}
