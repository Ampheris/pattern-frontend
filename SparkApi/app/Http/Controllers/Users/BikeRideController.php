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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $bikeId)
    {
        $http = new Http();
        $bike = $http::get(env('API_URL') . 'bikes/' . $bikeId);

        return view('Users.bikeride', [
            "bike" => $bike,
            "message" => $request['message'] ?? null
        ]);
    }

    public function startBikeRide(Request $request)
    {
        $http = new Http();
        $bike = $http::get(env('API_URL') . 'bikes/' . $request->input('bike'));

        $data = [
            'customer_id' => 1,
            'bike_id' => $bike['id']
        ];

        $http::post(env('API_URL') . 'bikehistory/start', $data);
        return redirect()->route('bikeride', ['bike_id' => $bike['id']]);
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
            return redirect()->route('bikeride', ['bike_id' => $bike['bike_id'], 'message' => $message]);
        }
            // $message  = null;
        return redirect()->route('bikeride', ['bike_id' => $bike['bike_id']]);
    }
}
