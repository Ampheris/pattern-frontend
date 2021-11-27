<?php

namespace App\Http\Controllers;

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

        $history = Http::get("http://localhost:8080/sparkapi/v1/bikehistory/user/" . "1");

        $history = json_decode($history, true);
        return view('history', [
            "history" => $history
        ]);
    }

    public function showSingleHistory($historyId)
    {
        $history = Http::get("http://localhost:8080/sparkapi/v1/bikehistory/" . $historyId);
        $history = json_decode($history, true);
        return view('singleHistory', [
            "history" => $history
        ]);
    }
}
