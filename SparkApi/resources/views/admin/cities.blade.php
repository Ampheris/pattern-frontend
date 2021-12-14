@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
      <button class="btn btn-outline-success" type="button"><a href="{{ route('createCity') }}">Lägg till stad</a></button>
    </form>
</nav>


<h1>Alla Städer </h1>
@foreach ($cities as $city)
    <p><a href="{{ route('showSingleCity', ['cityId' => $city['id']])}} "> {{ $city["city"] }} </a></p>
@endforeach
@endsection
