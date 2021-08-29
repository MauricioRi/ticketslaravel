@extends('layouts/contentLayoutMaster')

@section('title', 'Rutas')

@section('content')


<form action=" {{ route('rutasupdate', "$id") }}" method="POST">
    {{-- --}}
    @csrf
    @method('put')
    nombre de la ruta :
    {{-- id: {{$id}} --}}
    <label for=""><input type="text" value="{{ old('name', $ruta[0]->Name_route) }}" name="name"></label><br>
    @error('name')
        <br>
        <small>*{{ $message }}</small>
        <br>
    @enderror
    descripcion :
    <label for=""><input type="text" value="{{ old('description', $ruta[0]->description) }}"
            name="description"></label><br>
    @error('description')
        <br>
        <small>*{{ $message }}</small>
        <br>
    @enderror
    <div class="table points">
        <table class="default" border="1" id="TableA">
            <thead>
                <tr id="titles">
                </tr>
            </thead>
            <tbody id="Tablebody">
            </tbody>
        </table>
    </div>
    <input hidden type="text" value="" id="secretcamp" name="secretcamp"></label><br>
    <input hidden type="text" value="" id="listpoints" name="listpoints"></label><br>
    <button type="submit">Actualizar ruta</button>
</form>
<br>
<br>
<div>

</div>
<script>
    let route = @json($ruta);
    let puntos = @json($puntos);
    let id = @json($id);
</script>
<script src="{{ asset('js/funcionesEditarRuta.js') }}" defer>


</script>



{{-- @isset($results->dataSet)
    @include('panels/dataTable')
@endisset --}}

@endsection
