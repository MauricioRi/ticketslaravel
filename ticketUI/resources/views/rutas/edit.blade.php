

@extends('layouts.main')

@section('title', 'Editar Ruta')
    
@section('content')



     <form action="{{route("rutas_update","$ruta->id")}}" method="POST">
        @csrf
        @method('put')
        nombre de la ruta :
        <label for=""><input type="text" value="{{old('name',$ruta->Name_route)}}"  name="name"></label><br>
        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        descripcion :
        <label for=""><input type="text"  value="{{old('description',$ruta->Name_route)}}" name="description"></label><br>
        @error('description')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        numero de puntos :
        <label for=""><input type="number" value="{{old('numberpoints',$ruta->number_points)}}" name="numberpoints"></label><br>
        @error('numberpoints')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <button type="submit">Actualizar ruta</button>
     </form> 
     <table class="default" border="1">

<tr>

     @for ($fila = 1; $fila <($ruta->number_points)+1; $fila++)
     @for ($columna = 1; $columna <($ruta->number_points)+1; $columna++)
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