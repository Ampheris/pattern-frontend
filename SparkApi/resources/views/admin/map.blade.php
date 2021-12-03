@extends('admin/layouts.app')

@section('content')
<div class="map" id="map">

</div>
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
var map = L.map('map', { dragging: true }).setView([62.734757172052, 15.164843254715345], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',    {
        attribution: `&copy;
        <a href="https://www.openstreetmap.org/copyright">
        OpenStreetMap</a> contributors`
    }).addTo(map);

    let bikes = {!! $bikes !!};
    let cities = {!! $cities !!};
    let chargingstations = {!! $chargingstations !!};
    let parkingspaces = {!! $parkingspaces !!};



    for (var i = 0; i < bikes.length; i++) {
        console.log(bikes[i].X);
        if (bikes[i].status == 'tillgänglig') {
            var bikeId = bikes[i].id;
            L.marker([bikes[i].X, bikes[i].Y]).addTo(map).bindPopup(
                `<p>${bikes[i].status}</p><p>Batteri: ${bikes[i].battery}</p><a href='{{url('/bikeride')}}/${bikes[i].id}'>Boka cykel</a>`
            );
        } else {
            L.marker([bikes[i].X, bikes[i].Y]).addTo(map).bindPopup(
                `<p>${bikes[i].status}</p><p>Batteri: ${bikes[i].battery}</p>`
            );
        }
    }

    for (var i = 0; i < cities.length; i++) {
        console.log(cities[i].radius);
        var circle = L.circle([cities[i].X, cities[i].Y], {
            fillColor: '#00d640',
            stroke: '#00d640',
            radius: cities[i].radius
        }).addTo(map);
    }

    for (var i = 0; i < chargingstations.length; i++) {
        console.log(chargingstations[i].radius);
        var circle = L.circle([chargingstations[i].x_pos, chargingstations[i].y_pos], {
            fillColor: '#9e4209',
            stroke: '#9e4209',
            fillOpacity: 0.1,
            radius: chargingstations[i].radius
        }).addTo(map);
    }

    for (var i = 0; i < parkingspaces.length; i++) {
        console.log(parkingspaces[i].radius);
        var circle = L.circle([parkingspaces[i].x_pos, parkingspaces[i].y_pos], {
            fillColor: '#0862d1',
            stroke: '#0862d1',
            fillOpacity: 0.1,
            radius: parkingspaces[i].radius
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
</script>

@endpush
