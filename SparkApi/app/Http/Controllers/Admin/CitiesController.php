<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Http::get('http://localhost:8080/sparkapi/v1/cities');
        $cities = json_decode($cities, true);
        return view('admin.cities', [
            "cities" => $cities,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Http::get('http://localhost:8080/sparkapi/v1/cities');
        $cities = json_decode($cities, true);
        return view('admin.addCity', [
            "cities" => $cities,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeACity()
    {
        $cities = Http::get('http://localhost:8080/sparkapi/v1/cities');
        $cities = json_decode($cities, true);
        return view('admin.changeACity', [
            "cities" => $cities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'city' => $request->input('city'),
            'X' => $request->input('X'),
            'Y' => $request->input('Y'),
            'radius' => $request->input('radius'),
        ];

        Http::post("http://localhost:8080/sparkapi/v1/cities/", $data);
        return redirect('/admin/cities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSingleCity($city_id)
    {
        $city = Http::get("http://localhost:8080/sparkapi/v1/cities/" . $city_id);

        $city = json_decode($city, true);
        return view('admin.showSingleCity', [
            "city" => $city
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
