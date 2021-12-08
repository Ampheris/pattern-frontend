@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
      {{-- <button class="btn btn-outline-success" type="button"><a href="{{ route('addABike') }}">Lägg till stad</a></button> --}}
    </form>
  </nav>


<h1>Alla Sparkcyklar</h1>
@foreach ($bikes as $bike)
    <p><a href="{{route('showSingleBike', ['bikeId' => $bike['id']])}}"> ID: {{ $bike["id"] }} Name: {{ $bike["name"] }} </a></p>
@endforeach
@endsection
