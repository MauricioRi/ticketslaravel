@extends('layouts/contentLayoutMaster')

@section('title', 'Edición de empresa')

@section('content')

@php $obj = $results->objPorEditar; @endphp
<form action="{{ route('empresas.update',['id'=>$obj->id]) }}" id="newCompany" method="post">
    @csrf
    @if($obj !== null)
    <input type="hidden" value="{{ $obj->id }}" id="id" name="id" />
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Módulo para crear empresas</h4>
                    @if(null !== session()->get('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-body">{{ session()->get('successMsg') }} &nbsp;</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"> &times;</span></button>
                    </div>
                    @php session()->forget('successMsg'); @endphp
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nombre-empresa">Nombre de la empresa:</label>
                                <input type="text" class="form-control @error('nombre-empresa') is-invalid @enderror" id="nombre-empresa" name="nombre-empresa" value="{{$obj!==null? $obj->nombre : ''}}" placeholder="Nombre de la empresa" required />
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </div>
                <div class="card-footer">
                    <a href="{{ route('inicio') }}" class="btn btn-outline-secondary"><i class="fas fa-chevron-left fa-sm fa-fw"></i><span class="mtxt">Regresar</span></a>
                    <button class="dt-button create-new btn btn-primary" type="submit">
                        @if($obj!==null) 
                        <i class="fas fa-save fa-sm fa-fw"></i><span class="mtxt">Guardar</span>
                        @else
                        <i class="fas fa-plus fa-sm fa-fw"></i><span class="mtxt">Agregar</span>
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
