@extends('admin/layouts.app')
@section('content')

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
        <button class="btn btn-outline-success" type="button"><a href="{{ route('create') }}">Lägg till stad</a></button>
    </form>
  </nav>


<h1>Alla användare</h1>
{{ dd($users) }}
{{-- @foreach ($users as $user)
    <p><a href="{{route('showSingleUser', ['userId' => $user['id']])}}"> {{ $user["email"] }} </a></p>
@endforeach --}}

@endsection
