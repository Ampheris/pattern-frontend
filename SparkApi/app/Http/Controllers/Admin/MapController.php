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
        $access_token = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $headers_for_map = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role,
            "accessToken" => $access_token,
        ];

        $http = new Http();
        $bikes = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'bikes');
        $cities = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'cities');
        $chargingstations = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'chargingstations');
        $parkingspaces = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'parkingspaces');

        return view('admin.map', [
            "bikes" => $bikes,
            "cities" => $cities,
            "chargingstations" => $chargingstations,
            "parkingspaces" => $parkingspaces,
            "headersForMap" => json_encode($headers_for_map)
        ]);
    }
}
