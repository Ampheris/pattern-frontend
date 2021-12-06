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
        $bikes = Http::get(env('API_URL') . 'bikes');
        $cities = Http::get(env('API_URL') .'cities');
        $chargingstations = Http::get(env('API_URL') . 'chargingstations');
        $parkingspaces = Http::get(env('API_URL') . 'parkingspaces');

        return view('Users.map', [
            "bikes" => $bikes,
            "cities" => $cities,
            "chargingstations" => $chargingstations,
            "parkingspaces" => $parkingspaces
        ]);
    }
}
