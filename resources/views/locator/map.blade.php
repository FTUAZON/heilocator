<!-- resources/views/locators/map.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">HEI Map</h1>

    <div id="map" style="height: 500px; width: 100%;"></div>

</div>

<script>
   
    var map = L.map('map').setView([6.500376731017145, 124.84356812844985], 12); // Default coordinates

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    var locators = @json($locators);


    locators.forEach(function(locator) {
        if (locator.latitude && locator.longitude) {

            L.marker([locator.latitude, locator.longitude])
                .addTo(map)
                .bindPopup('<b>' + locator.name + '</b><br>' + locator.address);
        } else {
            console.log('Invalid coordinates for locator:', locator.name);
        }
    });
</script>
@endsection
    