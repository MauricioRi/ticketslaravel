{{-- @extends('layouts.main') --}}
@extends('layouts.app')


@section('title', 'Crear ruta')
    
@section('content')

<div class="wrapper">

    <div class="main-panel">
      <form action="{{route("rutas.store")}}" method="POST" >
     {{-- <form  action="" method="GET" onsubmit="return mySubmitFunction(event)">         onsubmit="guardarruta()"--}}
       
        @csrf 
       
        nombre de la ruta :
        <label for=""><input required type="text" value="{{old('name')}}" name="name"></label><br>
        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        descripcion :
        <label for=""><input required type="text"  value="{{old('description')}}" name="description"></label><br>
        @error('description')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
    
      <select required class="form-control"  name="namegeocerca" id="namegeocerca">
        <option value="0" selected="selected">Selecciona</option>
        @foreach ($geocercas as $rutas)
      <option value="{{ $rutas->id }}">{{ $rutas->nombre }}</option>
  @endforeach
</select>
 <button type="button" class="buttoninsert" >Añadir Punto</button>
 {{-- <button type="button" class="STATUS" >CHECK</button> --}}
      <br><br><br>
      
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
      <input  hidden type="text"  value="" id="secretcamp" name="secretcamp"></label><br>
      <input  hidden type="text"  value="" id="listpoints" name="listpoints"></label><br>
      <button disabled type="submit" id="buttoncreate">crear ruta</button>

      
    </form>
    
</div>




<script src="{{ asset('js/funcionesRutas.js') }}" defer></script>
@endsection


