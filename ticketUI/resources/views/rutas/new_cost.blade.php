@extends('layouts.app')

@section('content')
{{-- <meta name="csrf-token" content=""> --}}

<div class="container">
    @if ($errors->has('monto'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('monto') }}</strong>
        </span>
    @endif

    <div class="row">
        <div class="col-12 text-center">
            <h3>Nombre de la ruta</h3>
        </div>

        <div class="col-12 text-center">
            <h2>{{$ruta->Name_route}}</h2>
        </div>
    </div>

    @if (isset($points))

    <div class="row">
        <input type="hidden" name="" value="{{ csrf_token() }}" id="csrf-token">
        <input type="hidden" name="" value="{{ $ruta->id }}" id="idRoute" />
        <div class="col-lg-5 col-md-5 col-sm-12 col-12 phorizontal">
            <label for="pinicial">Punto inicial</label>
            <select name="pinicial" id="pinicial" class="form-control">
                <option value="">Selecciona un punto inicial</option>
                @foreach ($points as $point)
                    <option value="{{ $point->id }}">{{ $point->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-12 phorizontal">
            <label for="pfinal">Punto final</label>
            <select name="pfinal" id="pfinal" class="form-control">
                <option value="">Selecciona un punto final</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-12 phorizontal">
            <label for="costo">Costo ($)</label>
            <input type="number" name="costo" id="costo" class="form-control">

        </div>

        <div class="col-12 text-center">
            <button class="btn btn-primary" id="guardarCost">Guardar</button>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Punto inicial</th>
                        <th>Punto final</th>
                        <th>Costo ($)</th>
                    </tr>
                </thead>
                {{-- @dd($costRegister); --}}
                <tbody>
                    @foreach ($costRegister as $rowCost)
                        <tr>
                            <td>
                                {{ $rowCost->nombreO }}
                            </td>
                            <td>
                                {{ $rowCost->nombreD }}
                            </td>
                            <td>
                                {{ $rowCost->amount }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<script>

    // const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
console.log("object")
    document.addEventListener("DOMContentLoaded", load, true);

    function load() {
        console.log("object");
        let selectOrigen = document.getElementById("pinicial");
        let selectDestino = document.getElementById("pfinal")
        let campoCosto = document.getElementById("costo")
        let guardarButton = document.getElementById("guardarCost")

        guardarButton.addEventListener("click", (e) => {
            if(window.confirm(`¿Desea registrar el costo de ${campoCosto.value}?`)){
                fetch(
                    `/saveCostPoint`,
                    {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector("#csrf-token").value
                        },
                        body: JSON.stringify({
                            "idroute": document.querySelector("#idRoute").value,
                            "idorigen": selectOrigen.value,
                            "iddestino": selectDestino.value,
                            "monto": campoCosto.value
                        }),
                        method: 'POST'
                    }
                ).then(async response => //console.log( await response.json())
                response.json().then(result => {
                    if(result.status){
                        alert("Registro éxitoso");
                        location.reload();
                    }else{
                        alert("Error al registrar el costo")
                    }
                }
                )
                ).catch(e => console.log(e));
            }
        }, false)

        selectDestino.addEventListener("change", (e) => {
            let destinoId = e.target.value;

            let origenId = selectOrigen.value;

            fetch(
                `/getCostPoints/${origenId}/${destinoId}`,
                {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector("#csrf-token").value
                    }
                }
            ).then(response => response.json().then(result => {
                console.log(result);
                campoCosto.value = result.amount ?? "0";
            })).catch(e => console.log(e));
        }, false)

        selectOrigen.addEventListener("change", (e) => {
            console.log(e.target.value);
            let value = e.target.value;
            fetch(
                `/getFilterPoints/${value}`,{
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector("#csrf-token").value
                }}
            ).then(response =>
                response.json().then(r => {
                    removeOptions();

                    createOptions(r)
                })
            ).catch(e => {
                console.log(e);
            });
        }, false)
    }

    function createOptions(options) {
        let element = document.getElementById("pfinal");
        options.forEach( JsonValue => {
            let newOption = document.createElement('option')
            let optionText = document.createTextNode(JsonValue.nombre)

            newOption.appendChild(optionText)

            newOption.setAttribute("value", JsonValue.id)

            element.appendChild(newOption)
        })
    }

    function removeOptions() {
        let element = document.getElementById("pfinal");
        let i, L = element.options.length - 1;
        for(i = L; i >= 1; i--) {
            element.options[i] = null;
        }

        return "ready";
    }

</script>
@endsection
