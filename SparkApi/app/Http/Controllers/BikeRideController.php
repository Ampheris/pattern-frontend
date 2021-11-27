<?php

namespace App\Http\Controllers;

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

        $bike = Http::get("http://localhost:8080/sparkapi/v1/bikes/" . $bikeId);

        return view('bikeride', [
            "bike" => $bike
        ]);
    }

    public function startBikeRide(Request $request)
    {
        $bike = Http::get("http://localhost:8080/sparkapi/v1/bikes/" . $request->input('bike'));

        $data = [
            'start_x' => $bike['X'],
            'start_y' => $bike['Y'],
            'customer_id' => 1,
            'bike_id' => $bike['id']
        ];

        Http::post("http://localhost:8080/sparkapi/v1/bikehistory/start", $data);
        return redirect()->route('bikeride', ['bike_id' => $bike['id']]);
    }
}
