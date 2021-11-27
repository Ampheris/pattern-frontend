<?php

namespace App\Http\Controllers;

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
        $bikes = Http::get('http://localhost:8080/sparkapi/v1/bikes');
        $cities = Http::get('http://localhost:8080/sparkapi/v1/cities');
        $chargingstations = Http::get('http://localhost:8080/sparkapi/v1/chargingstations');
        $parkingspaces = Http::get('http://localhost:8080/sparkapi/v1/parkingspaces');

        return view('map', [
            "bikes" => $bikes,
            "cities" => $cities,
            "chargingstations" => $chargingstations,
            "parkingspaces" => $parkingspaces
        ]);
    }
}
