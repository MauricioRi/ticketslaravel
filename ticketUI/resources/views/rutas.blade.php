@extends('layouts.main')

@section('title', 'Listar Rutas')
    
@section('content')
<h1>Listar Rutas </h1>
<a href="{{route('crear_Rutas')}}">crear ruta </a>
    
<table class="default" border="1">
    <tr>
    <td>ID RUTA</td>
                  
    <td>NOMBRE DE RUTA</td>
    <td>DESCRIPCIÓN</td>
    <td>NUM PUNTOS</td>
    <td>ACCIÓN</td>

</tr>
        @foreach ($ruta as $rutas)
        <tr>
            <td>{{$rutas->id}}</td>
            <td> {{$rutas->Name_route}}</td>
            <td>{{$rutas->description}}</td>
            {{-- <td>{{$rutas->number_points}}</td> --}}
            
            <td><a href="{{route("editar_Rutas",$rutas->id)}}}">editar</a></td>
                  
                     
                  
                  
        </tr>   
                
        @endforeach

    </table>
{{$ruta->links()}}


@endsection