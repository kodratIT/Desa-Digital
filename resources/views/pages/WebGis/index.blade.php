@extends('layouts.main')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <style>
        #map { 
            height: 85vh;
            margin: 0px;
        }
      .container-fluid{
        padding:0px;
      }
      .main-content,.main-container ,.side-app{
        padding:0px;
      }

    </style>
@endsection
@section('content')

<div class="mt-3" id="map"></div>


@endsection
@section('script')
 <script>
    var map = L.map('map').setView([ -1.786017,103.5185], 16);

    L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
}).addTo(map);

    // Load GeoJSON data
    $.getJSON('geojson/data.geojson', function(data) {
        L.geoJSON(data).addTo(map);
    });
 </script>
@endsection