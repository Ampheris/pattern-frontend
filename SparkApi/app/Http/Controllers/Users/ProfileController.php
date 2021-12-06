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
        $http = new Http();
        $subscription = $http::get(env('API_URL') . 'subscriptions/' . '1');
        $user = $http::get(env('API_URL') . 'users/' . '1');

        $subscription = json_decode($subscription, true);
        return view('Users.profile', [
            'subscription' => $subscription,
            'balance' => $user['balance']
        ]);
    }

    public function subscription()
    {
        $http = new Http();
        $subscription = $http::get(env('API_URL') . 'subscriptions/' . 1);
        return view('Users.subscription', [
            'subscription' => $subscription
        ]);
    }

    public function balance()
    {
        $http = new Http();
        $user = $http::get(env('API_URL') . 'users/' . '1');
        return view('Users.balance', [
            'balance' => $user['balance']
        ]);
    }

    public function addToBalance(Request $request)
    {
        $http = new Http();
        $user = $http::get(env('API_URL') . 'users/' . '1');

        $data = [
            'balance' => $user['balance'] + $request['balance']
        ];

        $user = $http::put(env('API_URL') . 'users/' . 1, $data);
        return redirect()->route('balance');
    }

    public function manageSubscription()
    {
        $data = [
            'customer_id' => 1
        ];

        $http = new Http();
        $subscription = $http::post(env('API_URL') . 'subscriptions/', $data);
        return redirect()->route('subscription', [
            'subscription' => $subscription
        ]);
    }

    public function endSubscription(Request $request)
    {
        $http = new Http();
        $http::put(env('API_URL') . 'subscriptions/stop/' . $request['subscriptionId']);
        return redirect()->route('subscription');
    }
}
