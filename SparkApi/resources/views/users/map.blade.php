@extends('users/layouts.app')

@section('content')
<div class="map" id="map">
</div>
@if(isset($currentBikeRide['id']))
<a class="stop-bike-ride" href="{{ route('stopBikeRide') }}">Avsluta åktur</a>
@endif
@endsection
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

@endsection
@push('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>

<script>
var map = L.map('map', { dragging: true }).setView([62.734757172052, 15.164843254715345], 4);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',    {
        attribution: `&copy;
        <a href="https://www.openstreetmap.org/copyright">
        OpenStreetMap</a> contributors`
    }).addTo(map);

    const url='http://localhost:8080/sparkapi/v1/bikes';
    // fetch(url, {
    //     method: 'get',
    //     mode: 'no-cors'
    // })
    // .then(data=>{return data.json()})
    // .then(res=>{console.log(res);});


    // fetch(url, {
    //     method: 'get',
    //     mode: 'no-cors'
    // })
    //   .then(function(response) {
    //       console.log(response.json());
    //     return response;
    //   })
    //   .then(function(jsonResponse) {
    //       console.log(jsonResponse);
    //     // do something with jsonResponse
    //   });

  //   async function getBikes(url = '') {
  // // Default options are marked with *
  //     const response = await fetch(url, {
  //       method: 'GET', // *GET, POST, PUT, DELETE, etc.
  //       mode: 'no-cors', // no-cors, *cors, same-origin
  //     });
  //     return response.json(); // parses JSON response into native JavaScript objects
  //   }
  //
  //   getBikes('http://localhost:8080/sparkapi/v1/bikes')
  //     .then(data => {
  //       console.log(data); // JSON data parsed by `data.json()` call
  //     });

    let bikes = {!! $bikes !!};
    let cities = {!! $cities !!};
    let chargingstations = {!! $chargingstations !!};
    let parkingspaces = {!! $parkingspaces !!};
    let bikeLayer = L.layerGroup();

    let locationMarker = L.icon({
        iconUrl: "{{ url('img/location.png')}}",
        iconSize:     [24, 24],
        iconAnchor:   [12, 12],
        popupAnchor:  [0, 0]
    });

    console.log(bikes);

    function drawBikes() {
        // map.removeLayer(bikeLayer);
        // bikeLayer.clearLayers();
        for (var i = 0; i < bikes.length; i++) {
            console.log(bikes[i].X);
            if (bikes[i].status == 'available') {
                var bikeId = bikes[i].id;
                bikeLayer.addLayer(L.marker([bikes[i].X, bikes[i].Y]).bindPopup(
                    `<p>${bikes[i].status}</p><p>Batteri: ${bikes[i].battery}</p><a href='{{url('/bikeride')}}/${bikes[i].id}'>Boka cykel</a>`
                ));
            }
        }
        map.addLayer(bikeLayer);
    }

    for (var i = 0; i < cities.length; i++) {
        console.log(cities[i].radius);
        var circle = L.circle([cities[i].X, cities[i].Y], {
            fillColor: '#00d640',
            stroke: '#00d640',
            radius: cities[i].radius*110000
        }).addTo(map);
    }

    for (var i = 0; i < chargingstations.length; i++) {
        console.log(chargingstations[i].radius);
        var circle = L.circle([chargingstations[i].X, chargingstations[i].Y], {
            fillColor: '#9e4209',
            stroke: '#9e4209',
            fillOpacity: 0.1,
            radius: chargingstations[i].radius*110000
        }).addTo(map);
    }

    for (var i = 0; i < parkingspaces.length; i++) {
        console.log(parkingspaces[i].radius);
        var circle = L.circle([parkingspaces[i].X, parkingspaces[i].Y], {
            fillColor: '#0862d1',
            stroke: '#0862d1',
            fillOpacity: 0.1,
            radius: parkingspaces[i].radius*110000
        }).addTo(map);
    }

    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent(e.latlng.toString())
            .openOn(map);
    }

    map.on('click', onMapClick);

    var current_position;

   function onLocationFound(e) {
     // if position defined, then remove the existing position marker and accuracy circle from the map
     if (current_position) {
         map.removeLayer(current_position);
     }

     var radius = e.accuracy / 2;

     current_position = L.marker(e.latlng, {icon: locationMarker}).addTo(map)

   }

   function onLocationError(e) {
     alert(e.message);
   }

   map.on('locationfound', onLocationFound);

   // wrap map.locate in a function
   function locate() {
     map.locate();
   }

   // call locate every 3 seconds... forever
   setInterval(locate, 10000);
   // setInterval(drawBikes, 3000)
   drawBikes();
</script>

@endpush
