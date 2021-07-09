@extends('layouts.app')

@section('content')
<script src="{{ asset('js/funcionesUsuarios.js') }}" defer></script>
<div class="container">

    <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
    <div id="main">
        @if (Auth::check() && Auth::user()['tipo'] == 0)

        <div class="container">
            <!--{{ $user }}-->
            @if ($user->name != '')
            <form action="{{ URL::route('usuarios.update', $user->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="formUsuarioNombre" class="form-label">Nombre</label>
                    <input required type="text" class="form-control" id="formUsuarioNombre" aria-describedby="nombreHelp" value="{{ $user->name }}" name="nombre">
                    <div id="nombreHelp" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="formUsuarioContraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="formUsuarioContraseña" aria-describedby="contraseñaHelp" name="contra">
                    <div id="contraseñaHelp" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="formUsuarioCorreo" class="form-label">Correo</label>
                    <input required type="email" class="form-control" id="formUsuarioCorreo" aria-describedby="correoHelp" value="{{ $user->email }}" name="correo">
                    <div id="correoHelp" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="empresa" class="form-label">Empresa</label><br>
                    <select name="empresa" id="empresa"></select>

                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            @else
            <form action="{{ URL::route('usuarios.create') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="formUsuarioNombre" class="form-label">Nombre</label>
                    <input required type="text" class="form-control" id="formUsuarioNombre" aria-describedby="nombreHelp" name="nombre">
                    <div id="nombreHelp" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="formUsuarioContraseña" class="form-label">Contraseña</label>
                    <input required type="password" class="form-control" id="formUsuarioContraseña" aria-describedby="contraseñaHelp" name="contra">
                    <div id="contraseñaHelp" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="formUsuarioCorreo" class="form-label">Correo</label>
                    <input required type="email" class="form-control" id="formUsuarioCorreo" aria-describedby="correoHelp" name="correo">
                    <div id="correoHelp" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="empresa" class="form-label">Empresa</label><br>
                    <select name="empresa" id="empresa"></select>

                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            @endif


        </div>
        @endif

    </div>
</div>

<script>
    $(document).ready(function() {
        var jsonData = {!!$companies!!};
        var user = {!!$user!!};
        for (var i = 0; i < jsonData.length; i++) {
            $("#empresa").append('<option value="' + jsonData[i].id + '">' + jsonData[i].nombre + '</option>');
        }

        if (user.name != '') {
            $("#empresa").val(user.empresa)
            $('#empresa').prop('disabled', true)
        }
    });
</script>


@endsection