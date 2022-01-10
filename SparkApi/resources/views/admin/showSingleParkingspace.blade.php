{{-- 'Change the bike --}}
@extends('admin/layouts.app')
@section('content')
<a href="{{ route('parking') }}">Go back</a>


<div class="card" style="width: 20em; margin:auto">
    <div class="card-body">
      <p class="card-text"><b>ID</b>: {{ $parking["id"] }}</p>
      <p class="card-text"><b>Namn</b>: {{ $parking["name"] }}</p>
      <p class="card-text"><b>X,Y</b>: {{ $parking["X"] }}, {{ $parking["Y"] }}</p>
	  <p class="card-text"><b>Radius</b>: {{ $parking["radius"] }}</p>
    </div>
</div>


<form action="{{ route('storeUpdatedParkingspace') }}" method="post">
	@csrf

	<div class="form-group">
		<h1 class="alltitle">ID: {{ $parking["id"] }} Namn: {{ $parking["name"] }}</h1>
		<input type="hidden" id="parkingId" name="parkingId" value="{{ $parking["id"] }}">
	</div>

	<div class="form-group">
		<label for="name">Namn</label>
		<input type="text" id="name" class="form-control" name="name" value="{{ $parking["name"] }}">
	</div>

	<div class="form-group">
		<label for="X">X-Position</label>
		<input type="number" name="X" class="form-control" id="X" step="0.01" value="{{ $parking["X"] }}">
	</div>

	<div class="form-group">
		<label for="Y">Y-Position</label>
		<input type="number" name="Y" class="form-control" id="Y" step="0.01" value="{{ $parking["X"] }}">
	</div>

	<div class="form-group">
		<label for="radius">Radius</label>
		<input type="number" name="radius" class="form-control" id="radius" step="0.01" value="{{ $parking["radius"] }}">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Ändra parkeringen</button>
	</div>
</form>

@endsection
