{{-- 'Change the bike --}}
@extends('admin/layouts.app')
@section('content')
<a href="{{ route('chargingstations') }}">Go back</a>


<div class="card" style="width: 20em; margin:auto">
    <div class="card-body">
      <p class="card-text"><b>ID</b>: {{ $chargingstations["id"] }}</p>
      <p class="card-text"><b>Namn</b>: {{ $chargingstations["name"] }}</p>
      <p class="card-text"><b>X,Y</b>: {{ $chargingstations["X"] }}, {{ $chargingstations["Y"] }}</p>
	  <p class="card-text"><b>Radius</b>: {{ $chargingstations["radius"] }}</p>
    </div>
</div>


<form action="{{ route('storeUpdatedChargingstations') }}" method="post">
	@csrf

	<div class="form-group">
		<h1>ID: {{ $chargingstations["id"] }} Namn: {{ $chargingstations["name"] }}</h1>
		<input type="hidden" id="chargingstationId" name="chargingstationId" value="{{ $chargingstations["id"] }}">
	</div>

	<div class="form-group">
		<label for="name">Namn</label>
		<input type="text" id="name" class="form-control" name="name" value="{{ $chargingstations["name"] }}">
	</div>

	<div class="form-group">
		<label for="X">X-Position</label>
		<input type="number" name="X" class="form-control" id="X" step="0.01" value="{{ $chargingstations["X"] }}">
	</div>

	<div class="form-group">
		<label for="Y">Y-Position</label>
		<input type="number" name="Y" class="form-control" id="Y" step="0.01" value="{{ $chargingstations["X"] }}">
	</div>

	<div class="form-group">
		<label for="radius">Radius</label>
		<input type="number" name="radius" class="form-control" id="radius" step="0.01" value="{{ $chargingstations["radius"] }}">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Ändra laddstationen</button>
	</div>
</form>

@endsection
