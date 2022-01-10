{{-- 'Change the bike --}}
@extends('admin/layouts.app')
@section('content')
<a href="{{ route('bikes') }}">Go back</a>

<div class="card" style="width: 20em; margin:auto">
    <div class="card-body">
      {{-- <h5 class="card-title">Card title</h5> --}}
      <p class="card-text"><b>ID</b>: {{ $bikes["id"] }}</p>
      <p class="card-text"><b>Namn</b>: {{ $bikes["name"] }}</p>
      <p class="card-text"><b>Status</b>: {{ $bikes["status"] }}</p>
      <p class="card-text"><b>Batteri</b>: {{ $bikes["battery"] }}%</p>
      <p class="card-text"><b>X,Y</b>: {{ $bikes["X"] }}, {{ $bikes["Y"] }}</p>

      @if ($bikes["status"] != "unavailable")
        <form method="post" action="{{ route('destroyBike') }}" onsubmit="return confirm('Are you sure you want to delete this bike?');"> 
            @csrf
            <input type="hidden" id="bikeId" name="bikeId" value="{{ $bikes["id"] }}">
            <button type="submit" class="deletebutton">Radera cykeln</button>
        </form>
      @endif
    </div>
</div>


<form action="{{ route('storeNewBike') }}" method="post">
    @csrf

    <div class="form-group">
        <h1 class="alltitle">ID: {{ $bikes["id"] }} Namn: {{ $bikes["name"] }}</h1>
        <input type="hidden" id="bikeId" name="bikeId" value="{{ $bikes["id"] }}">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="available">Available</option>
            <option value="service">Service</option>
            <option value="unavailable">Unavailable</option>
        </select>

        <label for="battery">Batteri</label>
        <input type="number" id="battery" class="form-control" name="battery" min="0" max="100" value="{{ $bikes["battery"] }}">
    </div>

    <div class="form-group">
        <label for="laddstation">Välj Laddstation</label>

        <select name="laddstation" id="laddstation" class="form-control">
            <option value="null">Nej tack.</option>
            @foreach ($chargingstations as $chargingstation)
            <option value="{{ $chargingstation["id"] }}"> {{ $chargingstation["name"] }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="X">X-Position</label>
        <input type="number" name="X" class="form-control" id="X" step="0.01" value="{{ $bikes["X"] }}">
    </div>

    <div class="form-group">
        <label for="Y">Y-Position</label>
        <input type="number" name="Y" class="form-control" id="Y" step="0.01" value="{{ $bikes["Y"] }}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Ändra staden</button>
    </div>
</form>
@endsection