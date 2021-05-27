@extends('layouts.main')

@section('title', 'Crear ruta')
    
@section('content')



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
        numero de puntos :
        <label for=""><input type="number" value="{{old('numberpoints')}}" name="numberpoints"></label><br>
        @error('numberpoints')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror






        <button type="submit">crear ruta</button>
     </form>


     
@endsection