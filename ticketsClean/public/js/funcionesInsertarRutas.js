

$(document).ready(function () { });

var arraypuntos = [];
var feed = {}, data = [];
let cont = 0;
var costos =[];
// var columm = 0;
// var fila = 0;
var matriz = "";




$(document).on("click", ".STATUS", (e) => {
    
    // $.post('geocerca', {

    //     "datos": array,
    //     "name": name
    // }, function (data) {
    //     console.log(data);
    // });

    // Swal.fire({
    //     title: `Se guardo la geocerca ${name}`,
    //     icon: 'success'
    // })
    var tabla = document.getElementById('Tablebody')
    var x = document.getElementById("Tablebody").rows.length;
       console.log(x);
       if(x>0){
      
    }
});





$(document).on("click", ".buttoninsert", (e) => {

    var optVal = $("#namegeocerca option:selected").val();

    if (optVal > 0) {
        cont++;
        var namegoefence = $("#namegeocerca option:selected").text();
        console.log(namegoefence);
        $('#namegeocerca option').prop('selected', function () {
            return this.defaultSelected;
        });
        const resultado = data.find(data => data.namegoefence === namegoefence);
        if (typeof resultado === "undefined") {
            feed = {
                consecutive: cont,
                id: optVal,
                namegoefence: namegoefence
            }
            data.push(feed);


            var count = Object.keys(data).length;
            document.getElementById("buttoncreate").disabled = false;
            genera_tabla(count);
        }
    


    }


});





function genera_tabla(puntos) {


    arraypuntos = new Array(puntos);
    //Bucle para meter en cada posición otros array de 10
    for (var i = 0; i < puntos + 1; i++) {
        arraypuntos[i] = new Array(puntos + 1);
    }

    matriz = "";
    //   var tabla = document.getElementById('TableA') // table reference


    for (var x = 0; x < puntos + 1; x++) {
        matriz += "<tr>";
        for (var y = 0; y < puntos + 1; y++) {
            if (x == 0 && y == 0) {
                matriz += "<td>" + `<input disabled type="text" id="` + x + "," + y + `" name="` + x + "," + y + `" value="` + "ORIGEN/DESTINO" + `"></td>`;
            }

            if (x == 0 && y > 0) {
                matriz += "<td>" + `<input disabled type="text" id="` + x + "," + y + `" name="` + x + "," + y + `" value="` + data[y - 1].namegoefence + `"></td>`;
            }
            if (x > 0 && y == 0) {
                matriz += "<td>" + `<input disabled type="text" id="` + x + "," + y + `" name="` + x + "," + y + `" value="` + data[x - 1].namegoefence + `"></td>`;
            }
            if (x == y && x > 0 && y > 0) {
                // {{old(`+x + "," + y +`)}}
                const resultado = costos.find(busqueda => busqueda.origen == data[x -1].id && busqueda.destino == data[y-1].id);
                const posicion = costos.findIndex(busqueda => busqueda.origen == data[x -1].id && busqueda.destino == data[y-1].id);
                console.log(resultado);
                if (typeof resultado != "undefined") {
                matriz += "<td>" + `<input required type="number" class="matcost" id="` + x + "," + y + `" name="` + x + "," + y + `"value= "`+costos[posicion].costo+`" data-origen ="`+data[x -1].id+`" data-destino="`+data[y-1].id+`"></td>`;
            }
            else
            matriz += "<td>" + `<input required type="number" class="matcost" id="` + x + "," + y + `" name="` + x + "," + y + `"value= "" data-origen ="`+data[x -1].id+`" data-destino="`+data[y-1].id+`"></td>`;
            

        }
            if (y > x & x > 0 && y > 0) {
                //este la estaba cagando
                // arraypuntos[x][y]="{"+x+","+y+"}";
                //  arraypuntos[x][y]="<td>" + `<input type="text" id="` + x + "," + y + `" name="` + x + "," + y + `" value="` + "NO DISPONIBLE" + `"></td>`;
                arraypuntos[x][y] = `<input type="text" id="` + x + "," + y + `" name="` + x + "," + y + `" value="` + "NO DISPONIBLE";

                // matriz += "<td>" + `<input type="text" id="` + x + "," + y + `" name="` + x + "," + y + `" value="` + "NO DISPONIBLE" + `"></td>`;
            }
            if (y < x & x > 0 && y > 0) {
                matriz += "<td>" + `<input disabled type="text" id="` + x + "," + y + `" name="` + x + "," + y + `" value="` + "NO DISPONIBLE" + `"></td>`;
            }
            if (y > x & x > 0 && y > 0) {
                // {{old(`+x + "," + y +`)}
                const resultado = costos.find(busqueda => busqueda.origen == data[x -1].id && busqueda.destino == data[y-1].id);
                const posicion = costos.findIndex(busqueda => busqueda.origen == data[x -1].id && busqueda.destino == data[y-1].id);
                if (typeof resultado != "undefined") {
                    matriz += "<td>" + `<input required class="matcost" type="number" id="` + x + "," + y + `" name="` + x + "," + y + `"value="`+costos[posicion].costo+`" data-origen ="`+data[x -1].id+`" data-destino="`+data[y-1].id+`"></td>`;
                    console.log(resultado);
                }

                else
                matriz += "<td>" + `<input required class="matcost" type="number" id="` + x + "," + y + `" name="` + x + "," + y + `"value="" data-origen ="`+data[x -1].id+`" data-destino="`+data[y-1].id+`"></td>`;
                
            }
        }

        matriz += "</tr>";
    }










    var tabla = document.getElementById('Tablebody') // table reference
    tabla.innerHTML = matriz;

}
let arrayd = [];

// const form = document.getElementsByClassName('form');

// form.addEventListener('focusin', (event) => {
//   event.target.style.background = 'pink';
// });

// form.addEventListener('focusout', (event) => {
//   event.target.style.background = '';


// });



// $(".matcost").focusout(() => {
//     var ori=$(this).data("origen");
//     var dest=$(this).data("destino");
//   console.log(ori,dest);




  
    //id o

//     arrayd.push(
//         {
//             "costo": 55,
//             "idGO": 1,
//             "idGD": 2
//         }
//     );

//     $("#campoSecreto").val = JSON.stringify(arrayd);
// })
// var tabla = document.getElementById('Tablebody')
// let input = document.querySelector('input');

// input.onblur = inputBlur;
// input.onfocus = inputFocus;

// function inputBlur() {
//   input.value = 'Focus has been lost';
// }

// function inputFocus() {
//   input.value = 'Focus is here';
// }

$(document).on("blur", ".matcost", (e) => {
   // window.console.log(this.id, e);
  // console.log(e);
   
   const valor=e.target.value;
   const origen=e.target.getAttribute("data-origen");
   const destino=e.target.getAttribute("data-destino");


   if(valor!=""){
    const resultado = costos.find(data => data.origen == origen && data.destino == destino);
    const posicion = costos.findIndex(data => data.origen == origen && data.destino == destino);
    // console.log(resultado);
    if (typeof resultado === "undefined") {
        costos.push(
                    {
                        "costo": valor,
                        "origen": origen,
                        "destino": destino
                    }
            );
           console.log(JSON.stringify(costos)); 

    }
    else{
       
       
        costos[posicion].costo=valor;
        costos[posicion].origen=origen;
        costos[posicion].destino=destino;
        console.log(costos[posicion]);

    }
var campoSecreto = document.getElementById("secretcamp");

campoSecreto.value = JSON.stringify(costos);
//console.log(campoSecreto.value);


var listpoints = document.getElementById("listpoints");

listpoints.value = JSON.stringify(data);
console.log(listpoints.value);

}

});



