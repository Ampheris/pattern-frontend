@extends('users/layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row g-2">
        <div class="col-md-6">
            <div class="card bg-white p-3 px-4 d-flex justify-content-center">
                <h5 class="subscription-head">Månadskort</h5>
                @if(!empty($subscription))
                    @if ($subscription['cancelation_date'] == null)
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center"> <span>Period start</span> <span>{{ $subscription['start_date']}}</span> </div>
                        <div class="d-flex justify-content-between align-items-center"> <span>Ska förnyas</span> <span>{{ $subscription['renewal_date']}}</span> </div>
                    </div>
                    @elseif($subscription['cancelation_date'] < $subscription['renewal_date'])
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center"> <span>Period start</span> <span>{{ $subscription['start_date']}}</span> </div>
                        <div class="d-flex justify-content-between align-items-center"> <span>Giltigt fram till</span> <span>{{ $subscription['renewal_date']}}</span> </div>
                    </div>
                    @else
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center"> <span>Inget aktivt månadskort</span> <span></span> </div>
                    </div>
                    @endif
                @endif
                <a class="back-button" href="{{ route('subscription') }}">Hantera<i class="material-icons">arrow_forward</i></a>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row g-2">
        <div class="col-md-6">
            <div class="card bg-white p-3 px-4 d-flex justify-content-center">
                <h5 class="subscription-head">Ditt saldo</h5>
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center"> <span>Saldo:</span> <span>{{ round($balance, 1) }} kr</span> </div>
                </div>
                <a class="back-button" href="{{ route('balance') }}">Fyll på<i class="material-icons">arrow_forward</i></a>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row g-2">
        <div class="col-md-6">
            <div class="card bg-white p-3 px-4 d-flex justify-content-center">
                <h5 class="subscription-head">Din orderhistorik</h5>
                <a class="back-button" href="{{ route('orders') }}">Till orderhistorik<i class="material-icons">arrow_forward</i></a>
            </div>
        </div>
    </div>
</div>

@endsection
