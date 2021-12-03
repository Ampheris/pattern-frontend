@extends('admin/layouts.app')
@section('content')
<a href="{{ route('cities') }}">Go back</a>
<h1>Lägg till en stad </h1>
<form method="post" action="{{ route('store') }}">
    @csrf
    <label for="city">Namn på staden</label><br>
    <input type="text" id="city" name="city"><br>

    <label for="X">X Position</label><br>
    <input type="number" id="X" name="X" step="0.01">

    <label for="Y">Y Position</label><br>
    <input type="number" id="Y" name="Y" step="0.01">

    <label for="radius">Radius</label>
    <input type="number" id="radius" name="radius" step="0.01">

    <input type="submit" value="Submit">
</form>
@endsection
