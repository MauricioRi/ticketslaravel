@extends('layouts/contentLayoutMaster')

@section('title', 'Choferes')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="resultsDataTable" actionsUrl="{{ route('acciones-asignaciones') }}" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Unidad</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
                <br>
                                                
            </div>
        </div>
    </div>
</div>

@isset($results->dataSet)
    @include('panels/dataTable')
@endisset

@endsection
