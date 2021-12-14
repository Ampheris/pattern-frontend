<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $http = new Http();
        $parking = $http::get(env('API_URL') . 'parkingspaces');
        $parking = json_decode($parking, true);
        return view('admin.parkingspace', [
            "parking" => $parking,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $parkingId
     * @return \Illuminate\Contracts\View\View
     */
    public function showSingleParkingspace($parkingId)
    {
        $http = new Http();
        $parking = $http::get(env('API_URL') . 'parkingspaces/' . $parkingId);
        $parking = json_decode($parking, true);
        return view('admin.showSingleParkingspace', [
            "parking" => $parking
        ]);
    }


    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUpdatedParkingspace(Request $request)
    {
        $data = [
            'id'     => $request->input('parkingId'),
            'X'      => $request->input('X'),
            'Y'      => $request->input('Y'),
            'name'   => $request->input('name'),
            'radius' => $request->input('radius')
        ];

        $http = new Http();
        $parking = $http::put(env('API_URL') . 'parkingspaces/' . $data["id"], $data);
        return redirect()->route('showSingleParkingspace', ['parkingId' => $data['id']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function createParkingspace()
    {
        $http = new Http();
        $parking = $http::get(env('API_URL') . 'parkingspaces');
        $parking = json_decode($parking, true);
        return view('admin.addParkingspace', [
            "parking" => $parking,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function storeNewParkingspace(Request $request)
    {
        $data = [
            'name' => $request->input('city'),
            'X' => $request->input('X'),
            'Y' => $request->input('Y'),
            'radius' => $request->input('radius'),
        ];

        $http = new Http();
        $http::post(env('API_URL') . 'cities', $data);
        return redirect('/admin/cities');
    }
}