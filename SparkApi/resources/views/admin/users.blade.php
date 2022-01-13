@extends('admin/layouts.app')
@section('content')


<h1 class="alltitle">Alla användare</h1>
@foreach ($users as $user)
<div class="userlist">
    <div class="col">
        <img src="{{$user["avatar_url"]}}">
        <p><b>Roll:</b> {{$user["role"]}} </p>
        <p><b>Namn:</b> {{$user["github_name"]}}</p>
        {{-- <p><a class="changelink" href="{{ route('showSingleUser', ['userId' => $user['id']]) }} "> Ändra </a></p> --}}
    </div>
</div>
@endforeach

@endsection
