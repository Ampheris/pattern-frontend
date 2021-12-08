@extends('users/layouts.app')
@section('content')

    <form method="post" action="{{ route('loginUser') }}">
        @csrf
        <div class="form-group">
            <label for="login">login</label>
            <button type="submit" class="btn btn-primary">Logga in</button>
        </div>
    </form>
    @if (isset($login))
        {{ $login }}
    @endif

@endsection
