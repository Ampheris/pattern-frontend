@extends('users/layouts.app')

@section('content')
<a class="back-button" href="{{ route('map') }}"><i class="material-icons">arrow_back</i>Tillbaka</a>

<div class="container mt-5 mb-5">
    <div class="row g-2">
        <div class="col-md-6">
            <div class="card bg-white p-3 px-4 d-flex justify-content-center">
                <h5 class="subscription-head">Åktur avslutad</h5> <span class="subscription-price"></span>
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center"> <span>Påbörjad</span> <span>{{ $bikeride['start_time'] }}</span> </div>
                    <div class="d-flex justify-content-between align-items-center"> <span>Avslutad</span> <span>{{ $bikeride['stop_time'] }}</span> </div>
                    <div class="d-flex justify-content-between align-items-center"> <span>Pris</span> <span>{{ $bikeride['total_price'] == null ? 'Månadskort' : round($bikeride['total_price'], 1) . 'kr' }}</span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
