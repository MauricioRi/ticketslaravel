@extends('layouts.app')

@section('content')

    <div class="container">

        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">
            @if (Auth::check() && Auth::user()['tipo'] == 0)

                <div class="container">
                    {{ $company->nombre }}
                    @if ($company->nombre != '')
                        <form action="{{ URL::route('empresas.update',$company->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="formEmpresaNombre" class="form-label">Nombre</label>
                                <input required type="text" class="form-control" id="formEmpresaNombre"
                                    aria-describedby="nombreHelp" value="{{ $company->nombre }}" name="nombre">
                                <div id="nombreHelp" class="form-text">Nombre de la empresa</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    @else
                        <form action="{{ URL::route('empresas.create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="formEmpresaNombre" class="form-label">Nombre</label>
                                <input required type="text" class="form-control" id="formEmpresaNombre"
                                    aria-describedby="nombreHelp" value="{{ $company->nombre }}" name="nombre">
                                <div id="nombreHelp" class="form-text">Nombre de la empresa</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    @endif


                </div>
            @endif

        </div>
    </div>


@endsection
