@extends('users/layouts.app')

@section('content')
<p class="list-header">Ordrar</p>
<div class="list-group">
@foreach ($orders as $order)
  <a href="{{ route('singleOrder', ['orderId' => $order['id']]) }}" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{ $order['customer_id'] }}</h5>
      <small>{{ $order['total_price'] }}</small>
    </div>
    <p class="mb-1"></p>
    <small></small>
  </a>
@endforeach
</div>
@endsection
