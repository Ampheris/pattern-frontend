@extends('auth/layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button><a href="{{ 'loginGithub' }}">Login github</a></button>
        </div>
    </div>
</div>
@endsection
