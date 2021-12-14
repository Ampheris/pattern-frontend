@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
      <button class="btn btn-outline-success" type="button"><a href="{{ route('createChargingstation') }}">Lägg till laddstation</a></button>
    </form>
</nav>


<h1>Alla Laddstationer</h1>
@foreach ($chargingstations as $chargingstation)
    <p><a href="{{ route('showSingleChargingstation', ['chargingstationId' => $chargingstation['id']])}} "> {{ $chargingstation["name"] }} </a></p>
@endforeach
@endsection
