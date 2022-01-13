@extends('users/layouts.app')

@section('content')
<p class="list-header">Historik</p>
<div class="list-group">
@foreach ($history as $item)
<div class="container mt-5 mb-5">
  <div class="row g-2">
      <div class="col-md-6 list-item">
          <div class="card bg-white p-3 px-4 d-flex justify-content-center">
              <span class="subscription-price">{{ $item['date'] }}</span>
              <div class="mt-4">
                  @if(is_null($item['stop_time']))
                  <div class="d-flex justify-content-between align-items-center"> <span>Pågående</span></div>
                  <div class="d-flex justify-content-between align-items-center"> <span>Cykel id: {{ $item['bike_id']}}</span></div>
                  @else
                    <div class="d-flex justify-content-between align-items-center"> <span>Åkturens längd:</span> <span>{{ round($item['time'], 1) }} minuter</span> </div>
                      @if(!is_null($item['total_price']))
                          <div class="d-flex justify-content-between align-items-center"> <span>Parkerad:</span> <span>{{ $item['inside_parking_area'] === 0 ? 'Utanför avsett område. + 10 kr avgift.' : 'Innanför avsett område.' }}</span> </div>
                          <div class="d-flex justify-content-between align-items-center"> <span>Pris:</span> <span>{{ round($item['total_price'], 1) }} kr</span> </div>
                      @else
                          <div class="d-flex justify-content-between align-items-center"> <span>Pris:</span> <span>Månadskort</span> </div>
                      @endif
                  @endif
              </div>
          </div>
      </div>
  </div>
</div>
@endforeach
</div>
@endsection
