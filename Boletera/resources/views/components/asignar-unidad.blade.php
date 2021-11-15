@extends('layouts/contentLayoutMaster')

@section('title', 'Gestión de usuarios')

@section('content')

    @php $obj = $results->objPorEditar; @endphp
    <form action="{{ route('asigunidad') }}" id="asignaruni" method="post">
        @csrf
        @if ($obj !== null)
            <input type="hidden" value="{{ $obj->id }}" id="id" name="id" />
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                        @if (null !== session()->get('successMsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="alert-body">{{ session()->get('successMsg') }} &nbsp;</div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true"> &times;</span></button>
                            </div>
                            @php session()->forget('successMsg'); @endphp
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre(s):</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                        id="nombre" name="nombre"
                                        value="{{ old('nombre') ?: ($obj !== null ? $obj->nombre : '') }}"
                                        placeholder="Nombre(s) del usuario" required disabled />                                    
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="divider">
                                    <div class="divider-text">
                                        <i class="far fa-id-card fa-fw"></i><span class="mtxt"> Unidad del usuario</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">                            
                            <select required class="form-control" name="idunidad" id="namegeocerca">
                                <option value="0" selected="selected">Selecciona</option>
                                @foreach ($unidades as $unidad)
                                    <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                @endforeach
                            </select>
                                        
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('inicio') }}" class="btn btn-outline-secondary"><i
                                class="fas fa-chevron-left fa-sm fa-fw"></i><span class="mtxt">Regresar</span></a>
                        <button class="dt-button create-new btn btn-primary" type="submit">
                            @if ($obj !== null)
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
