<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
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

        $subscription = Http::get(env('API_URL') . 'subscriptions/' . '1');
        $user = Http::get(env('API_URL') . 'users/' . '1');

        $subscription = json_decode($subscription, true);
        return view('Users.profile', [
            'subscription' => $subscription,
            'balance' => $user['balance']
        ]);
    }

    public function subscription()
    {
        $subscription = Http::get(env('API_URL') . 'subscriptions/' . '3');
        return view('Users.subscription', [
            'subscription' => $subscription
        ]);
    }

    public function balance()
    {
        $user = Http::get(env('API_URL') . 'users/' . '1');
        return view('Users.balance', [
            'balance' => $user['balance']
        ]);
    }

    public function manageSubscription(Request $request)
    {

        var_dump($request);
        $data = [
            'user_id' => 3
        ];

        $subscription = Http::post(env('API_URL') . 'subscription/', $data);
        return view('Users.subscription', [
            'subscription' => $subscription
        ]);
    }
}
