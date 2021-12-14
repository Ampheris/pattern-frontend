@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
      <button class="btn btn-outline-success" type="button"><a href="{{ route('createChargingstation') }}">Lägg till laddstation</a></button>
    </form>
</nav>


<h1 class="alltitle">Alla Laddstationer</h1>
<div class="container">
    <div class="row">
        @foreach ($chargingstations as $chargingstation)
        <div class="boxeslist">
            <div class="col">
                <p><b>Namn</b>: {{ $chargingstation["name"] }}</p>
                <p><b>ID</b>: {{ $chargingstation["id"] }}</p>
                <p><b>X,Y</b>: {{ $chargingstation["X"] }}, {{ $chargingstation["Y"] }}</p>
                <p><b>Radius</b>: {{ round($chargingstation["radius"], 5) }}</p>
                <p><a class="boxlink" href="{{ route('showSingleChargingstation', ['chargingstationId' => $chargingstation['id']])}} "> Ändra </a></p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
