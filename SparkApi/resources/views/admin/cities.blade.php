@extends('layouts.app')
@section('content')
<h1>Hej</h1>


{{-- Change the city --}}
<form method="PUT" action="">
    {!! csrf_field() !!}

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div>
        <label for="city">Välj en stad:</label>
            <select id="city" name="city">
                <option value="city" disabled selected="true">Välj en stad</option>
                @foreach ($cities as $city)
                    <option value="{{ $city["id"] }}"> {{ $city["city"] }} </option>
                @endforeach
            </select>
    </div>

    <div>
        <label for="radius">Change radius</label>
        <input type="number" id="radius" name="radius" step="0.01">
    </div>

    <div>
        <button type="submit">
            Ändra staden
        </button>
    </div>
</form>

@foreach ($cities as $city)
    
@php
        var_dump($city["city"]);
        @endphp
@endforeach    
@endsection