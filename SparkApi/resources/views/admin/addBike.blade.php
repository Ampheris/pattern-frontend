@extends('admin/layouts.app')
@section('content')
@php
    if (!isset($error)) {
        $error = null;
    }
@endphp
<a href="{{ route('bikes') }}">Go back</a>

<form method="post" action="{{ route('storeBike') }}">
    @csrf
    <div class="form-group">
        <h1>Lägg till en sparkcykel</h1>
    </div>
    <div class="form-group">
        <div class="error">
            <p>{{ $error }}</p>
        </div>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
    </div>
    <div class="form-group">
        <select name="id" id="id" class="form-control">
            @foreach ($cities as $city)
            <option value="{{ $city["id"] }}"> {{ $city["city"] }}</option>
            @endforeach
        </select>
    </div>
    @php
    @endphp
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Lägg till sparkcykel</button>
    </div>
</form>
@endsection
