<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

</head>
@extends('layouts.app')

@section('content')
<script src="{{ asset('js/funcionesGeocercas.js') }}" defer></script>
    <div class="container">

        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">

            <div id="map">

            </div>
        </div>
    </div>

    <script>
    
        $(document).ready(function() {

            initMap();
            geo = {!! $geofence !!};
            if (geo.datos) {
                cargarGeocerca();
            }
        });
    </script>
    <style>
        #map {
            height: 95%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>
@endsection
