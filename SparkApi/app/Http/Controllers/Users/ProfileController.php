<?php

namespace App\Http\Controllers\Users;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
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
     * @return Renderable
     */
    public function index(): Renderable
    {
        $cookie = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];


        $http = new Http();
        $subscription = $http::withToken($cookie)->withHeaders($headers)->get(env('API_URL') . 'subscriptions/user');
        $user = $http::withToken($cookie)->withHeaders($headers)->get(env('API_URL') . 'users/get');

        $user = json_decode($user);
        $subscription = json_decode($subscription, true);

        return view('users.profile', [
            'subscription' => $subscription,
            'balance' => $user->balance
        ]);
    }

    public function subscription(Request $request)
    {
        $cookie = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $http = new Http();

        $subscription = $http::withToken($cookie)->withHeaders($headers)->get(env('API_URL') . 'subscriptions/user');
        $addSubscription = false;
        $date = Carbon::now();
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
        $cookie = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $http = new Http();
        $user = $http::withToken($cookie)->withHeaders($headers)->get(env('API_URL') . 'users/get');

        return view('users.balance', [
            'balance' => $user['balance'],
            "message" => $request['message'] ?? null
        ]);
    }

    // public function showBalanceForm()
    // {
    //     return redirect()->route('balance', ['addBalance' => true]);
    // }

    public function showSubscriptionPayForm(): RedirectResponse
    {
        return redirect()->route('subscription', ['addSubscription' => true]);
    }

    public function addToBalance(Request $request): RedirectResponse
    {
        $http = new Http();
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $cookie = $_COOKIE['access_token'];

        $http::withToken($cookie)->withHeaders($headers)->patch(env('API_URL') . 'users/balance?balance=' . $request['balance']);
        return redirect()->route('profile');
    }

    public function manageSubscription()
    {
        $cookie = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $http = new Http();
        $subscription = $http::withToken($cookie)->withHeaders($headers)->get(env('API_URL') . 'subscriptions/start');
        return redirect()->route('subscription', [
            'subscription' => $subscription
        ]);
    }

    public function endSubscription(Request $request): RedirectResponse
    {
        $cookie = $_COOKIE['access_token'];
        $role = $_COOKIE['role'];

        $headers = [
            'Api_Token' => env('API_TOKEN'),
            'role' => $role
        ];

        $subId = $_POST['subscriptionId'];
        $http = new Http();

        $http::withToken($cookie)->withHeaders($headers)->get(env('API_URL') . 'subscriptions/stop/' . $subId);
        return redirect()->route('subscription');
    }
}
