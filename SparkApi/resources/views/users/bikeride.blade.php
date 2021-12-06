@extends('users/layouts.app')

@section('content')
<div class="container">
    <p>{{ $bike['id'] }}</p>
    <p>{{ $bike['status'] }}</p>

@if (isset($message))
{{ $message }}
@endif

@if ($bike['status'] == 'available')
    <form method="post" action="{{ route('startBikeRide') }}">
    @csrf
        <input type="submit" name="submit" value="Starta cykeln">
        <input type="hidden" name="bike" value="{{ $bike['id'] }}">
    </form>
@endif
</div>
@endsection
