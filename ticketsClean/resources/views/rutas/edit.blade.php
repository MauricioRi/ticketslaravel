

@extends('layouts.app')

@section('title', 'Editar Ruta')
    
@section('content')



     {{-- <form action="{{route("rutas_update","$ruta->id")}}" method="POST"> --}}
          <form action="" method="POST">
        @csrf
        @method('put')
        nombre de la ruta :
        <label for=""><input type="text" value="{{old('name',$ruta[0]->Name_route)}}"  name="name"></label><br>
        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        descripcion :
        <label for=""><input type="text"  value="{{old('description',$ruta[0]->description)}}" name="description"></label><br>
        @error('description')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
       

        <button type="submit">Actualizar ruta</button>
     </form> 
     <div  class="table points">
       
        <table class="default" border="1" id="TableA">
            <thead>
                <tr id="titles">
              
              
                </tr>
              </thead>
              <tbody id="Tablebody">       
                          </tbody>
                 </table>

     
       

      </div>
<br>
<br>
<script>
 let route = @json($ruta);
let puntos = @json($puntos);
let id =@json($id);
</script>
<script src="{{ asset('js/funcionesEditarRuta.js') }}" defer>


</script>
@endsection