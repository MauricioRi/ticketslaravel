@extends('layouts/contentLayoutMaster')

@section('title', 'Choferes')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="resultsDataTable" actionsUrl="{{ route('acciones-choferes') }}" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
                <br>
                <a href="./choferes/nuevo">
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
