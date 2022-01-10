<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class HistoryController extends Controller
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
        $cookie = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];


        $http = new Http();
        $history = $http::withToken($cookie)->withHeaders($headers)->get(env('API_URL') . 'bikehistory/user');
        $history = json_decode($history, true);

        foreach ($history as $key => $value) {
            $time = Carbon::parse($value['stop_time'])->diffInSeconds(Carbon::parse($value['start_time']));
            $history[$key]['time'] = $time / 60;
            $date = Carbon::parse($value['start_time'])->format('Y-d-m');
            $history[$key]['date'] = $date;
        }

        return view('users.history', [
            'history' => $history
        ]);
    }
}
