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
        $access_token = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $http = new Http();
        $chargingstations = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'chargingstations');
        $chargingstations = json_decode($chargingstations, true);
        return view('admin.chargingstations', [
            "chargingstations" => $chargingstations,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function createChargingstation()
    {
        $access_token = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $http = new Http();
        $chargingstations = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'chargingstations');
        $chargingstations = json_decode($chargingstations, true);
        return view('admin.addChargingstation', [
            "chargingstations" => $chargingstations,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $parkingId
     * @return \Illuminate\Contracts\View\View
     */
    public function showSingleChargingstation($chargingstationId)
    {
        $access_token = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];
        $http = new Http();
        $chargingstations = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'chargingstations/' . $chargingstationId);
        $bikes = $http::withToken($access_token)->withHeaders($headers)->get(env('API_URL') . 'chargingstation/bikes/' . $chargingstationId);
        $bikes = json_decode($bikes, true);
        $chargingstations = json_decode($chargingstations, true);
        return view('admin.showSingleChargingstation', [
            "chargingstations" => $chargingstations,
            "bikes" => $bikes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Routing\Redirector
     */
    public function storeNewChargingstation(Request $request)
    {
        $access_token = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $data = [
            'name' => $request->input('name'),
            'X' => $request->input('X'),
            'Y' => $request->input('Y'),
            'radius' => $request->input('radius')
        ];
        $http = new Http();
        $http::withToken($access_token)->withHeaders($headers)->post(env('API_URL') . 'chargingstations', $data);
        return redirect('/admin/chargingstations');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function storeUpdatedChargingstations(Request $request)
    {
        $access_token = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $data = [
            'id' => $request->input('chargingstationId'),
            'X' => $request->input('X'),
            'Y' => $request->input('Y'),
            'name' => $request->input('name'),
            'radius' => $request->input('radius')
        ];

        $http = new Http();
        $parking = $http::withToken($access_token)->withHeaders($headers)->put(env('API_URL') . 'chargingstations/' . $data["id"], $data);
        return redirect('/admin/chargingstations');
    }

}
