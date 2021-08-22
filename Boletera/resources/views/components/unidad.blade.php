@extends('layouts/contentLayoutMaster')

@section('title', 'Gestión de usuarios')

@section('content')

    @php $user = $results->usuarioPorEditar; @endphp
    <form action="{{ route('newunidad') }}" id="newUnidad" method="post">
        @csrf
        @if ($user !== null)
            <input type="hidden" value="{{ $user->id }}" id="id" name="id" />
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
                                        value="{{ old('nombre') ?: ($user !== null ? $user->nombre : '') }}"
                                        placeholder="Nombre(s) del usuario" required />
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('inicio') }}" class="btn btn-outline-secondary"><i
                                class="fas fa-chevron-left fa-sm fa-fw"></i><span class="mtxt">Regresar</span></a>
                        <button class="dt-button create-new btn btn-primary" type="submit">
                            @if ($user !== null)
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
