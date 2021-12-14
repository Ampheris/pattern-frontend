{{-- Change the city --}}
@extends('admin/layouts.app')
@section('content')
<a href="{{ route('cities') }}">Go back</a>


<div class="card" style="width: 20em; margin:auto">
    <div class="card-body">
      {{-- <h5 class="card-title">Card title</h5> --}}
      <p class="card-text"><b>ID</b>: {{ $city["id"] }}</p>
      <p class="card-text"><b>Namn</b>: {{ $city["city"] }}</p>
      <p class="card-text"><b>Radius</b>: {{ $city["radius"] }}</p>
      <p class="card-text"><b>X,Y</b>: {{ $city["X"] }}, {{ $city["Y"] }}</p>
    </div>
</div>


<form action="{{ route('storeNewCity') }}" method="post">
    @csrf

    <div class="form-group">
        <h1>Ändra {{ $city["city"] }}</h1>
        <input type="hidden" id="cityId" name="cityId" value="{{ $city["id"] }}">

        
        <label for="X">X-Position</label>
        <input type="number" name="X" class="form-control" id="X" step="0.01" value="{{ $city["X"] }}">
        
        <label for="Y">Y-Position</label>
        <input type="number" name="Y" class="form-control" id="Y" step="0.01" value="{{ $city["Y"] }}">

        <label for="radius">Radius</label>
        <input type="number" id="radius" class="form-control" name="radius" step="0.01" value="{{ $city["radius"] }}">
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-primary">Ändra staden</button>
    </div>
</form>
@endsection

