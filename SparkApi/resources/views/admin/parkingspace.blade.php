@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
      <button class="btn btn-outline-success" type="button"><a href="{{ route('createParkingspace') }}">Lägg till parkeringsplats</a></button>
    </form>
</nav>


<h1>Alla Parkeringsplatser</h1>
@foreach ($parking as $park)
    <p><a href="{{ route('showSingleParkingspace', ['parkingId' => $park['id']])}} "> {{ $park["name"] }} </a></p>
@endforeach
@endsection
