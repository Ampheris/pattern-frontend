@extends('users/layouts.app')

@section('content')
<div class="container">
    <p>{{ $bikeride['id'] }}</p>

    @if ($bikeride['stop_time'] == null)
        <form method="post" action="{{ route('stopBikeRide') }}">
        @csrf
            <input type="submit" name="submit" value="Avsluta åktur">
            <input type="hidden" name="bikeride" value="{{ $bikeride['id'] }}">
        </form>
    @endif
</div>
</div>
@endsection
