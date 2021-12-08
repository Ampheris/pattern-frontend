@extends('admin/layouts.app')
@section('content')
<a href="{{ route('cities') }}">Go back</a>
<form method="post" action="{{ route('store') }}">
    @csrf
    <div class="form-group">
        <h1>Lägg till en stad </h1>
        <label for="city">Namn på staden</label>
        <input type="text" name="city" class="form-control" id="city" aria-describedby="city">
        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
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
        <input type="radius" name="radius" class="form-control" id="radius" step="0.01">
        <button type="submit" class="btn btn-primary">Lägg till stad</button>
    </div>
</form>
@endsection