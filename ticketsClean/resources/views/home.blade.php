@extends('layouts.app')

@section('content')

    <div class="container">

        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">
            @if (Auth::check() && Auth::user()['tipo'] == 0)
                {{ 'sdfgsdgsd' }}
                {{  Auth::user()}}
                <a href="#">Crear usuarios</a>
            @endif
        </div>
    </div>

@endsection
