@extends('admin/layouts.app')
@section('content')
<a href="{{ route('chargingstations') }}">Go back</a>


<form method="post" action="{{ route('storeNewChargingstation') }}">
    @csrf
    <div class="form-group">
        <h1>Lägg till en laddstation</h1>
        <label for="name">Namn på laddstationen</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
    </div>

    <div class="form-group">
        <label for="X">X-Position</label>
        <input type="number" name="X" class="form-control" id="X" step="0.01">
    </div>
    <div class="form-group">
        <label for="Y">Y-Position</label>
        <input type="number" name="Y" class="form-control" id="Y" step="0.01">
    </div>
    <div class="form-group">
        <label for="radius">Radius</label>
        <input type="number" name="radius" class="form-control" id="radius" step="0.01">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Lägg till laddstation</button>
    </div>
</form>
@endsection
