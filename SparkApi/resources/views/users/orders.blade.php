@extends('users/layouts.app')

@section('content')
<a class="back-button" href="{{ route('profile') }}"><i class="material-icons">arrow_back</i>Tillbaka</a>

<p class="list-header">Ordrar</p>
<div class="list-group">
@foreach ($orders as $order)
<div class="container mt-5 mb-5">
    <div class="row g-2">
        <div class="col-md-6 list-item">
            <div class="card bg-white p-3 px-4 d-flex justify-content-center">
                @if ($order['subscription'] == '1')
                <span class="subscription-price">Månadskort</span>
                @else
                <span class="subscription-price">Åktur</span>
                @endif
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center"> <span>Pris</span> <span>{{ $order['total_price']}} kr</span> </div>
                    <div class="d-flex justify-content-between align-items-center"> <span>Datum</span> <span>{{ $order['created_at']}}</span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
