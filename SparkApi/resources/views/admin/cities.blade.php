@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
      <button class="btn btn-outline-success" type="button"><a href="{{ route('create') }}">Lägg till stad</a></button>
      <button class="btn btn-outline-success" type="button"><a href="{{ route('changeACity') }}">Ändra stad</a></button>
    </form>
  </nav>


<h1>Alla Städer </h1>
@foreach ($cities as $city)
    <p><a href="{{route('showSingleCity', ['city_id' => $city['id']])}}"> {{ $city["city"] }} </a></p>
@endforeach


{{-- Change the city --}}
{{-- <h1>Ändra en stad</h1> --}}
{{-- <form action="">
    {{ method_field('PUT') }}

    {!! csrf_field() !!}
    @csrf

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
</form> --}}


@endsection