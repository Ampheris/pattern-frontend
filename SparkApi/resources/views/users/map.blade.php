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

    // green bike icon
    var greenIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    for (var i = 0; i < bikes.length; i++) {
        console.log(bikes[i].X);
        if (bikes[i].status === 'available') {
            var bikeId = bikes[i].id;
            bikeLayer.addLayer((L.marker([bikes[i].X, bikes[i].Y], {icon: greenIcon}).bindPopup(
                `<p>${bikes[i].status}</p><p>Batteri: ${bikes[i].battery}</p><a href='{{url('/startbikeride')}}/${bikes[i].id}'>Starta åktur</a>`
            )));
        }
    }
    bikeLayer.addTo(map);

    // Cities circle
    for (var i = 0; i < cities.length; i++) {
        console.log(cities[i].radius);
        var circle = L.circle([cities[i].X, cities[i].Y], {
            fillColor: '#00d640',
            color: '#2aad27',
            radius: cities[i].radius*110000
        }).addTo(map);
    }

    // Chargingstation circle
    for (var i = 0; i < chargingstations.length; i++) {
        console.log(chargingstations[i].radius);
        var circle = L.circle([chargingstations[i].X, chargingstations[i].Y], {
            fillColor: '#9e4209',
            color: '#987654',
            fillOpacity: 0.1,
            radius: chargingstations[i].radius*110000
        }).addTo(map);
    }

    // Parkingspace Circle
    for (var i = 0; i < parkingspaces.length; i++) {
        console.log(parkingspaces[i].radius);
        var circle = L.circle([parkingspaces[i].X, parkingspaces[i].Y], {
            fillColor: '#0862d1',
            color: '#0862d1',
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

    let current_position;

    function geoSuccess(pos) {
        if (typeof current_position === 'undefined') {
            map.setView([pos.coords.latitude, pos.coords.longitude], 17);
        }

        if (current_position) {
               map.removeLayer(current_position);
        }

        current_position = L.marker(
            [pos.coords.latitude, pos.coords.longitude],
            {icon: locationMarker}
         ).addTo(map)
    }

    function geoError(error) {
        console.log('code: '    + error.code    + '\n' +
              'message: ' + error.message + '\n');
    }

    function locate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                geoSuccess,
                geoError
            );
        }
    }

     // call locate every 3 seconds... forever
    locate();
    setInterval(locate, 3000);

    map.on('click', onMapClick);
</script>

@endpush
