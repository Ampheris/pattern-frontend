<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $http = new Http();
        $cities = $http::get(env('API_URL') . 'cities');
        $cities = json_decode($cities, true);
        return view('admin.cities', [
            "cities" => $cities,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function createCity()
    {
        $http = new Http();
        $cities = $http::get(env('API_URL') . 'cities');
        $cities = json_decode($cities, true);
        return view('admin.addCity', [
            "cities" => $cities,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function storeCity(Request $request)
    {
        $data = [
            'city' => $request->input('city'),
            'X' => $request->input('X'),
            'Y' => $request->input('Y'),
            'radius' => $request->input('radius'),
        ];

        $http = new Http();
        $http::post(env('API_URL') . 'cities', $data);
        return redirect('/admin/cities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cityId
     * @return \Illuminate\Contracts\View\View
     */
    public function showSingleCity($cityId)
    {
        $http = new Http();
        $city = $http::get(env('API_URL') . 'cities/' . $cityId);
        $city = json_decode($city, true);
        return view('admin.showSingleCity', [
            "city" => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNewCity(Request $request)
    {
        $data = [
            'id' => $request->input('cityId'),
            'radius' => $request->input('radius'),
            'X' => $request->input('X'),
            'Y' => $request->input('Y')
        ];

        $http = new Http();
        $http::put(env('API_URL') . 'cities/' . $data["id"], $data);
        return redirect()->route('cities');
    }
}
