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
        $http = new Http();
        // $bike = $http::get(env('API_URL') . 'bikes/' . $bikeId);
        $bikeride = $http::get(env('API_URL') . 'bikehistory/' . $bikerideId);
        // $bikeride = json_decode($bikeride);
        $bikeride = json_decode($bikeride, true);
        return view('users.bikeride', [
            "bikeride" => $bikeride[0]
        ]);
    }

    public function startBikeRide($bikeId)
    {
        $http = new Http();
        $bike = $http::get(env('API_URL') . 'bikes/' . $bikeId);
        $data = [
            'customer_id' => 1,
            'bike_id' => $bike['id']
        ];

        $http::post(env('API_URL') . 'bikehistory/start', $data);
        return redirect()->route('map');
    }

    public function stopBikeRide()
    {
        $http = new Http();
        $bike = $http::get(env('API_URL') . 'bikehistory/user/active/' . 1);
        $bikeRide = $http::put(env('API_URL') . 'bikehistory/stop/' . 1);

        var_dump(json_decode($bike));
        var_dump(json_decode($bikeRide));
        if (isset($bikeRide['message'])) {
            $message  = $bikeRide['message'];
            return redirect()->route('addToBalance', ['message' => $message]);
        }
            // $message  = null;
        return redirect()->route('bikeride', $bikeRide['id']);
    }
}
