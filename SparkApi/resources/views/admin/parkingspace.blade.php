@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
      <button class="btn btn-outline-success" type="button"><a href="{{ route('createParkingspace') }}">Lägg till parkeringsplats</a></button>
    </form>
</nav>


<h1 class="alltitle">Alla Parkeringsplatser</h1>
<div class="container">
    <div class="row">
        @foreach ($parking as $park)
        <div class="boxeslist">
            <div class="col">
                <p><b>Namn</b>: {{ $park["name"] }}</p>
                <p><b>ID</b>: {{ $park["id"] }}</p>
                <p><b>X,Y</b>: {{ $park["X"] }}, {{ $park["Y"] }}</p>
                <p><b>Radius</b>: {{ round($park["radius"], 5) }}</p>
                <p><a class="boxlink" href="{{ route('showSingleParkingspace', ['parkingId' => $park['id']])}} "> Ändra </a></p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
