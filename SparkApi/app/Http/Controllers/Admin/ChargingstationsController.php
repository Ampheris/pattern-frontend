<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ChargingstationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $http = new Http();
        $chargingstations= $http::get(env('API_URL') . 'chargingstations');
        $chargingstations = json_decode($chargingstations, true);
        return view('admin.chargingstations', [
            "chargingstations" => $chargingstations,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createChargingstation()
    {
        $http = new Http();
        $chargingstations = $http::get(env('API_URL') . 'changingstations');
        $chargingstations = json_decode($chargingstations, true);
        return view('admin.addChargingstation', [
            "chargingstations" => $chargingstations,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $parkingId
     * @return \Illuminate\Contracts\View\View
     */
    public function showSingleChargingstation($chargingstationId)
    {
        $http = new Http();
        $chargingstations = $http::get(env('API_URL') . 'chargingstations/' . $chargingstationId);
        $chargingstations = json_decode($chargingstations, true);
        return view('admin.showSingleChargingstation', [
            "chargingstations" => $chargingstations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function storeNewChargingstation(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'X' => $request->input('X'),
            'Y' => $request->input('Y'),
            'radius' => $request->input('radius')
        ];
        $http = new Http();
        $http::post(env('API_URL') . 'chargingstations', $data);
        return redirect('/admin/chargingstations');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUpdatedChargingstations(Request $request)
    {
        $data = [
            'id'     => $request->input('chargingstationId'),
            'X'      => $request->input('X'),
            'Y'      => $request->input('Y'),
            'name'   => $request->input('name'),
            'radius' => $request->input('radius')
        ];

        $http = new Http();
        $parking = $http::put(env('API_URL') . 'chargingstations/' . $data["id"], $data);
        return redirect()->route('showSingleChargingstation', ['chargingstationId' => $data['id']]);
    }

}
