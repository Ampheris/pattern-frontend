<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.map', [
            "bikes" => $bikes,
            "cities" => $cities,
            "chargingstations" => $chargingstations,
            "parkingspaces" => $parkingspaces,
            "apiUrl" => env('API_URL')
        ]);
    }
}
