@extends('users/layouts.app')

@section('content')
<div class="container">
    <p>{{ $balance }}</p>
    <a href="{{ route('balance') }}">Fyll på</a>
</div>
@endsection
