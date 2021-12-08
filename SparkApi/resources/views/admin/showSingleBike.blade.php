{{-- Change the city --}}
@extends('admin/layouts.app')
@section('content')
<a href="{{ route('bikes') }}">Go back</a>
<form action="PUT">
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
    <div class="form-group">
        <h1>ID: {{ $bike["id"] }} Namn: {{ $bike["name"] }}</h1>
        <input type="hidden" id="userId" name="userId" value="{{ $bike["id"] }}">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="available">Available</option>
            <option value="service">Service</option>
            <option value="unavailable">Unavailable</option>
        </select>

        <label for="battery">Batteri</label>
        <input type="number" id="battery" class="form-control" name="battery" min="0" max="100">
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
        <button type="submit" class="btn btn-primary">Ändra staden</button>
    </div>
</form>
@endsection

