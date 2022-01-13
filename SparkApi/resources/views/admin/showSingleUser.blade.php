{{-- Change the city --}}
@extends('admin/layouts.app')
@section('content')
<a href="{{ route('users') }}">Go back</a>


<p> {{$user}} </p>
{{-- {{dd($user)}} --}}
{{-- <div class="card" style="width: 20em; margin:auto">
    <div class="card-body">
      <p class="card-text"><b>ID</b>: {{ $user["id"] }}</p>
      <p class="card-text"><b>Radius</b>: {{ $user["radius"] }}</p>
      <p class="card-text"><b>X,Y</b>: {{ $user["X"] }}, {{ $user["Y"] }}</p>
    </div>
</div> --}}



@endsection

