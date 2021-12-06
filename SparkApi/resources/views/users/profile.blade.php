@extends('users/layouts.app')

@section('content')
<div class="container">
    <p>{{ $subscription['start_date'] }}</p>
    <a href="{{ route('subscription') }}">Hantera</a>
    <p>{{ $balance }}</p>
    <a href="{{ route('balance') }}">Fyll på</a>
</div>
@endsection
