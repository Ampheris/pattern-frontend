@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
      <button class="btn btn-outline-success" type="button"><a href="{{ route('createCity') }}">Lägg till stad</a></button>
    </form>
</nav>

<h1 class="alltitle">Alla Städer</h1>
<div class="container">
    <div class="row">
        @foreach ($cities as $city)
        <div class="boxeslist">
            <div class="col">
                <p class="biggername">{{ $city["city"] }}</p>
                <p><b>ID</b>: {{ $city["id"] }}</p>
                <p><b>X,Y</b>: {{ $city["X"] }}, {{ $city["Y"] }}</p>
                <p><b>Radius</b>: {{ round($city["radius"], 5) }}</p>
                <p><a class="boxlink" href="{{ route('showSingleCity', ['cityId' => $city['id']])}} "> Ändra </a></p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
