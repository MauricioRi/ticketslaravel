

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
     <table class="default" border="1">

<tr>
    {{-- <?php $key = array_search(40489, array_column($userdb, 'uid')); ?>
    <?php array_search($needle, array_column($array, 'key')); ?> --}}
     @for ($fila = 0; $fila <($ruta->count())+1; $fila++)
     @for ($columna = 0; $columna <($ruta->count())+1; $columna++)
    @if ($fila==1 || $columna==1)
    <td>CARGANDO...</td>
    {{-- <td><input type="text" id="{{$fila."-".$columna}}" name="{{$fila."-".$columna}}" value="datos..."></td> --}}
    @elseif ($fila==$columna)
    <td>$<input type="number" id="{{$fila."-".$columna}}" name="{{$fila."-".$columna}}" value=""></td>
        
@elseif ($fila>$columna)
<td>NO DISPONIBLE</td>
@else
<td>$<input type="number" id="{{$fila."-".$columna}}" name="{{$fila."-".$columna}}" value=""></td>   


@endif
@endfor
</tr>

 @endfor
</table>
<br>
<br>

@endsection