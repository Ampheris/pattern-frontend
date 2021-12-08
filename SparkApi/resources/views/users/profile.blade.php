@extends('users/layouts.app')

@section('content')
<div class="container">
    <p>Start: {{ $subscription['start_date'] }}</p>
    <p>Renew: {{ $subscription['renewal_date'] }}</p>
    <p>Stop: {{ $subscription['cancelation_date'] }}</p>

    <a href="{{ route('subscription') }}">Hantera</a>
    <p>{{ $balance }}</p>
    <a href="{{ route('balance') }}">Fyll på</a>

    <a href="{{ route('orders') }}">Se dina ordrar</a>

</div>
@endsection
