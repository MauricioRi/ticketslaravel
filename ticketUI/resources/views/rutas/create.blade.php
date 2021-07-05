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
        {{-- numero de puntos :
        <label for=""><input type="number" value="{{old('numberpoints')}}" name="numberpoints"></label><br>
        @error('numberpoints')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror --}}






        <button type="submit">crear ruta</button>
     </form>
     <select class="form-select" aria-label="Default select example">
        <option selected>Nombre geocerca</option>
        <option value="1">Maravatio</option>
        <option value="2">Pazcuaro</option>
        <option value="3">uriangato</option>
      </select>

     <button type="submit">Agregar Punto </button>
     {{-- C:\xampp\htdocs\ticketslaravel\ticketUI\public\assets\js\rutas\rutas.js --}}
     <script src="{{ asset('js/rutas/rutas.js')}}"></script>
@endsection
