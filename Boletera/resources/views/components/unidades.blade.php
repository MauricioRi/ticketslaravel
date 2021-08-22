@extends('layouts/contentLayoutMaster')

@section('title', 'Unidades')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="resultsDataTable" actionsUrl="{{ route('acciones-unidades') }}" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
                <br>
                <a href="./unidades/nuevo">
                    <button class="btn btn-primary" >Nuevo</button>
                </a>                                 
            </div>
        </div>
    </div>
</div>

@isset($results->dataSet)
    @include('panels/dataTable')
@endisset

@endsection
