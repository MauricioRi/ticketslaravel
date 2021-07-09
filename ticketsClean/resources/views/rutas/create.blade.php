{{-- @extends('layouts.main') --}}
@extends('layouts.app')


@section('title', 'Crear ruta')
    
@section('content')

<div class="wrapper">

    <div class="main-panel">

     <form action="{{route("rutas.store")}}" method="POST">
       
        @csrf
       
        nombre de la ruta :
        <label for=""><input type="text" value="{{old('name')}}" name="name"></label><br>
        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        descripcion :
        <label for=""><input type="text"  value="{{old('description')}}" name="description"></label><br>
        @error('description')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        {{-- numero de puntos :
        <label for=""><input type="number" value="{{old('numberpoints')}}" name="numberpoints"></label><br>
        @error('numberpoints')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror --}}






        
     <select class="form-select namegeocerca" >
        <option selected>Nombre geocerca</option>
        <option value="1">Maravatio</option>
        <option value="2">Pazcuaro</option>
        <option value="3">uriangato</option>
      </select>
      <button type="button" class="buttoninsert" >Añadir Punto</button>
      <br><br><br>
     

      <div  class="table points">
        <table class="default" border="1">
            <tr>
                <td>ID GEOCERCA</td>

                <td>ORDEN</td>
                <td>NOMBRE</td>
                {{-- <td>NUM PUNTOS</td> --}}
               

            </tr>
            {{-- @foreach ($ruta as $rutas)
                <tr>
                    <td>{{ $rutas->id }}</td>
                    <td> {{ $rutas->Name_route }}</td>
                    <td>{{ $rutas->description }}</td>
                    

                    <td><a href="{{ route('editar_Rutas', $rutas->id) }}}">Editar_Costos</a><br><a href="{{ route('editar_Rutas', $rutas->id) }}}">Editar_Puntos</a></td>
                    




                </tr>

            @endforeach --}}

        </table>


      </div>
      <button type="submit">crear ruta</button>
    </form>

    </div>
</div>




<script type="text/javascript">
    $(document).on("click", ".buttoninsert", (e) => {
    //  $("#buttoninsert").click(function(){
        console.log(entro);
    
    });
    
    var itemArray = {}, itemObject = [];
    itemArray.id = 1;
    itemArray.name = "albert";
    itemObject.push(itemArray);
    
    </script>

@endsection


