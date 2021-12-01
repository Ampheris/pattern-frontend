@extends('users/layouts.app')

@section('content')
<div class="list-group">
@foreach ($history as $item)
  <a href="{{ route('singleHistory', ['historyId' => $item['id']]) }}" class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{ $item['start_time'] }}</h5>
      <small>{{ $item['stop_time'] }}</small>
    </div>
    <p class="mb-1">Sträcka</p>
    <small>Pris</small>
  </a>
@endforeach
</div>
@endsection
