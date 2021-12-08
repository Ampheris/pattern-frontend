{{-- Change the city --}}
@extends('admin/layouts.app')
@section('content')
<a href="{{ route('users') }}">Go back</a>
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
        <h1>Ändra {{ $users["email"] }}</h1>
        <input type="hidden" id="userId" name="userId" value="{{ $users["id"] }}">
        <label for="radius">Change radius</label>
        <input type="number" id="radius" class="form-control" name="radius" step="0.01">
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Ändra staden</button>
    </div>
</form>
@endsection

