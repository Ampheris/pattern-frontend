@extends('auth/layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="welcome-text">
            <h1>Välkommen till Sparkfy</h1>
            <h3>Logga in för att fortsätta</h3>
        </div>
        <div class="col-md-8">
            <a class="login" href="{{ 'loginGithub' }}">Logga in med github <i class="fab fa-github"></i></a>
        </div>
    </div>
</div>
@endsection
