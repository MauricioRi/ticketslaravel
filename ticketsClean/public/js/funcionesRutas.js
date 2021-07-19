

$(document).ready(function () { });

var arraypuntos = [];
var feed = {}, data = [];
let cont = 0;
// var columm = 0;
// var fila = 0;
var matriz = "";




$(document).on("click", ".STATUS", (e) => {
    
    $.post('geocerca', {

        "datos": array,
        "name": name
    }, function (data) {
        console.log(data);
    });

    Swal.fire({
        title: `Se guardo la geocerca ${name}`,
        icon: 'success'
    })
    var tabla = document.getElementById('Tablebody')
    var x = document.getElementById("Tablebody").rows.length;
    
    var gato = "";
    var count = Object.keys(data).length;
    //console.log(count);
    //console.log(matriz);
    //Bucle que recorre el primer array
    // for (var i = 0; i < arraypuntos.length; i++) {
    //     //Bucle que recorre el array que está en la posición i
    //     for (var j = 0; j < arraypuntos[i].length; j++) {
    //         gato += arraypuntos[i][j];
    //     }
    //     gato += "\n";
    // }
    // console.log(gato);



    //  appendColumn();
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
                matriz += "<td>" + `<input required type="number" id="` + x + "," + y + `" name="` + x + "," + y + `"value={{old(`+x + "," + y +`)}}""></td>`;
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
                matriz += "<td>" + `<input required type="number" id="` + x + "," + y + `" name="` + x + "," + y + `"value={{old(`+x + "," + y +`)}}""></td>`;
            }
        }

        matriz += "</tr>";
    }










    var tabla = document.getElementById('Tablebody') // table reference
    tabla.innerHTML = matriz;

}



