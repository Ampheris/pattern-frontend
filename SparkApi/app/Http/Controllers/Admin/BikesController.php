<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $http = new Http();
        $bikes = $http::get(env('API_URL') . 'bikes');
        $bikes = json_decode($bikes, true);
        return view('admin.bikes', [
            "bikes" => $bikes,
        ]);
    }


    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $bikeId
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showSingleBike($bikeId)
    {
        $http = new Http();
        $bikes = $http::get(env('API_URL') . 'bikes/' . $bikeId);
        $chargingstations= $http::get(env('API_URL') . 'chargingstations');
        $chargingstations = json_decode($chargingstations, true);
        $bikes = json_decode($bikes, true);
        return view('admin.showSinglebike', [
            "bikes" => $bikes,
            "chargingstations" => $chargingstations
        ]);
    }
    

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNewBike(Request $request)
    {
        if ($request->input('laddstation') == 'null') {
            $x = $request->input('X');
            $y = $request->input('Y');
        } else {
            $http = new Http();
            $chargingstations = $http::get(env('API_URL') . 'chargingstations/' . $request->input('laddstation'));
            $chargingstations = json_decode($chargingstations, true);
            $x = $chargingstations["X"];
            $y = $chargingstations["Y"];
        }

        $data = [
            'id' => $request->input('bikeId'),
            'X' => $x,
            'Y' => $y,
            'status' => $request->input('status'),
            'battery' => $request->input('battery')
        ];
        
        $http = new Http();
        $bikes = $http::put(env('API_URL') . 'bikes/' . $data["id"], $data);
        return redirect()->route('showSingleBike', ['bikeId' => $data['id']]);
    }
    
    
    /**
     * Display the specified resource.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\View
     */
    public function destroyBike(Request $request)
    {
        $http = new Http();
        $bike = $request->input("bikeId");
        $bikes = $http::get(env('API_URL') . 'bikes');
        $http::delete(env('API_URL') . 'bikes/' . $bike);
        $bikes = json_decode($bikes, true);
        return redirect()->route('bikes', [
            "bikes" => $bikes
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function storeBike(Request $request)
    {
        $http = new Http();
        $cities = $http::get(env('API_URL') . 'cities/' . $request->input("id"));
        $cities = json_decode($cities, true);
        $data = [
            'name' => "Sparky-" . $request->input("name"),
            'X' => $cities["X"],
            'Y' => $cities["Y"],
            'velocity' => 0,
            'status' => 'available',
            'battery' => 100
        ];
        $test = $http::post(env('API_URL') . 'bikes', $data);
        if ($test->failed()) {
            $bikes = $http::get(env('API_URL') . 'bikes');
            $cities = $http::get(env('API_URL') . 'cities');
    
            $cities = json_decode($cities, true);
            $bikes = json_decode($bikes, true);
            return view('admin.addBike',
            [
                "error" => "Namnet finns redan",
                "bikes" => $bikes,
                "cities" => $cities
            ]);
        }
        $bikes = $http::get(env('API_URL') . 'bikes');
        $bikes = json_decode($bikes, true);
        return view('/admin/bikes', [
            "bikes" => $bikes,
        ]);
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function createBike()
    {
        $http = new Http();
        $bikes = $http::get(env('API_URL') . 'bikes');
        $cities = $http::get(env('API_URL') . 'cities');

        $cities = json_decode($cities, true);

        $bikes = json_decode($bikes, true);
        return view('admin.addBike', [
            "bikes" => $bikes,
            "cities" => $cities
        ]);
    }
}
