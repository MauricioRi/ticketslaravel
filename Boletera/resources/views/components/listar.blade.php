@extends('layouts/contentLayoutMaster')

@section('title', 'Rutas')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="resultsDataTable" actionsUrl="{{ route('acciones-geocerca') }}" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@isset($results->dataSet)
    @include('panels/dataTable')
@endisset

@endsection
{{-- @extends('layouts.app')

@section('content')
<script src="{{ asset('js/funcionesRutas.js') }}"></script>
    <div class="wrapper">

        <div class="main-panel">
            <h1>Listar Rutas </h1>
            <a href="{{ route('crear_Rutas') }}">crear ruta </a>

            <table class="default" border="1">
                <tr>
                    <td>ID RUTA</td>

                    <td>NOMBRE DE RUTA</td>
                    <td>DESCRIPCIÓN</td>
                    {{-- <td>NUM PUNTOS</td> --}}
                    <td>ACCIÓN</td>

                </tr>
                @foreach ($ruta as $rutas)
                    <tr>
                        <td>{{ $rutas->id }}</td>
                        <td> {{ $rutas->Name_route }}</td>
                        <td>{{ $rutas->description }}</td>
                        {{-- <td>{{ $rutas->number_points }}</td> --}}

                        <td><a href="{{ route('editar_Rutas', $rutas->id) }}">Editar_Costos</a><br>
                            {{-- <a href="{{ route('editar_Rutas', $rutas->id) }}">Eliminar ruta</a> --}}
                        </td>
                        




                    </tr>

                @endforeach

            </table>
            {{ $ruta->links() }}

        </div>
    </div>






@endsection --}}
