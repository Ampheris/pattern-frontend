<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

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
        $user = json_decode($user);
        $subscription = json_decode($subscription, true);
        return view('users.profile', [
            'subscription' => $subscription,
            'balance' => $user->balance
        ]);
    }

    public function subscription(Request $request)
    {
        $http = new Http();
        $subscription = $http::get(env('API_URL') . 'subscriptions/' . 1);
        $addSubscription = false;
        $carbon = new Carbon();
        $date = $carbon::now();
        $subscriptionActive = false;
        if (isset($subscription['id']) && ($subscription['cancelation_date'] == null || $subscription['renewal_date'] < $date)) {
            $subscriptionActive = true;
        }

        if (isset($request->addSubscription)) {
            $addSubscription = true;
        }
        return view('users.subscription', [
            'subscription' => $subscription,
            'addSubscription' => $addSubscription,
            'subscriptionActive' => $subscriptionActive
        ]);
    }

    public function balance(Request $request)
    {
        $http = new Http();
        $user = $http::get(env('API_URL') . 'users/' . '1');

        return view('users.balance', [
            'balance' => $user['balance'],
            "message" => $request['message'] ?? null
        ]);
    }

    // public function showBalanceForm()
    // {
    //     return redirect()->route('balance', ['addBalance' => true]);
    // }

    public function showSubscriptionPayForm()
    {
        return redirect()->route('subscription', ['addSubscription' => true]);
    }

    public function addToBalance(Request $request)
    {
        $http = new Http();
        $user = $http::get(env('API_URL') . 'users/' . '1');

        $data = [
            'balance' => $user['balance'] + $request['balance']
        ];

        $user = $http::put(env('API_URL') . 'users/' . 1, $data);
        return redirect()->route('profile');
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
