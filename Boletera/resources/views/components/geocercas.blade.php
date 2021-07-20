@extends('layouts/contentLayoutMaster')

@section('title', 'Geocercas')

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
