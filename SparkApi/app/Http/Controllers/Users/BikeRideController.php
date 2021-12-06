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
    public function index($bikeId)
    {

        $bike = Http::get(env('API_URL') . 'bikes/' . $bikeId);

        return view('Users.bikeride', [
            "bike" => $bike
        ]);
    }

    public function startBikeRide(Request $request)
    {
        $bike = Http::get(env('API_URL') . 'bikes/' . $request->input('bike'));

        $data = [
            'start_x' => $bike['X'],
            'start_y' => $bike['Y'],
            'customer_id' => 1,
            'bike_id' => $bike['id']
        ];

        Http::post(env('API_URL') . 'bikehistory/start', $data);
        return redirect()->route('bikeride', ['bike_id' => $bike['id']]);
    }
}
