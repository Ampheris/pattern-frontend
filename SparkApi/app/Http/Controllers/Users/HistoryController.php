<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $http = new Http();
        $history = $http::get(env('API_URL') . 'bikehistory/user/' . '1');

        $history = json_decode($history, true);
        return view('users.history', [
            "history" => $history
        ]);
    }

    public function showSingleHistory($historyId)
    {
        $http = new Http();
        $history = $http::get(env('API_URL') . 'bikehistory/' . $historyId);
        $history = json_decode($history, true);
        return view('users.singleHistory', [
            "history" => $history
        ]);
    }
}
