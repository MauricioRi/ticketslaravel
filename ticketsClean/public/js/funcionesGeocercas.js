var map;
var poligonos = [];
var geo;



const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

function eliminarGeocerca(geocerca) {
    
    Swal.fire({
        title: 'Seguro?',
        text: "No se podra deshacer esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax('geocerca/' + geocerca, {
                type: 'DELETE'
            }, function (data) {
                console.log(data);
            });
            Swal.fire(
                'Eliminada',
                'Se elimino la geocerca',
                'success'
            );
            table.bootstrapTable('refresh')
            
        }
    })


}


function editarGeocerca(id) {
    location.href = '/geocerca/'+id
}

function cargarGeocerca() {
    
    poligonos.forEach(function (p) {
        p.setMap(null);
    });
    poligonos = new Map();
    var datos = geo.datos;
    paths = [];

    var json = JSON.parse(datos);
    console.log(json);
    json.forEach(function (entry) {
        path = {};
        coords = entry.split(',');
        path.lat = parseFloat(coords[0]);
        path.lng = parseFloat(coords[1])
        paths.push(path);
    });
    console.log(paths);
    var polygon = new google.maps.Polygon({
        paths: paths,
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#FF0000",
        fillOpacity: 0.35,
        editable: true,
        dbid: geo.id
    });

    poligonos.set(geo.id, polygon);

    polygon.getPaths().forEach(function (path, index) {
        google.maps.event.addListener(path, 'insert_at', function () {
            updatePolygonCoords(polygon, polygon.dbid)

        });

        google.maps.event.addListener(path, 'remove_at', function () {
            updatePolygonCoords(polygon, polygon.dbid)

        });

        google.maps.event.addListener(path, 'set_at', function () {
            updatePolygonCoords(polygon, polygon.dbid)

        });
    })
    polygon.setMap(map);
}


function initMap() {

    // The map, centered at Uluru
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: new google.maps.LatLng(19.7059504, -101.1971712),
    });
    // The marker, positioned at Uluru
    const drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.MARKER,
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [
                //google.maps.drawing.OverlayType.MARKER,
                //google.maps.drawing.OverlayType.CIRCLE,
                google.maps.drawing.OverlayType.POLYGON,
                //google.maps.drawing.OverlayType.POLYLINE,
                //google.maps.drawing.OverlayType.RECTANGLE,
            ],
        },
        markerOptions: {
            icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
        },
        circleOptions: {
            fillColor: "#ffff00",
            fillOpacity: 1,
            strokeWeight: 5,
            clickable: false,
            editable: false,
            zIndex: 1,
        },
    });
    drawingManager.setMap(map);

    google.maps.event.addListener(drawingManager, 'overlaycomplete', function (polygon) {
        console.log(polygon)
        console.log(drawingManager)
        var coordinatesArray = polygon.overlay.getPath().getArray();
        //console.log(coordinatesArray);
        var saved = getPolygonCoords(polygon.overlay);
        console.log(saved)
        if (!saved) {
            polygon.overlay.map = null;

        }
    });
}

async function getPolygonCoords(myPolygon) {
    var len = myPolygon.getPath().getLength();
    var htmlStr = "";
    var array = [];

    for (var i = 0; i < len; i++) {
        htmlStr += myPolygon.getPath().getAt(i).toUrlValue(5) + ", ";
        //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
        //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
        array.push(myPolygon.getPath().getAt(i).toUrlValue(5))
    }

    console.log(htmlStr);
    var name = '';
    await (async () => {


        const {
            value: val
        } = await Swal.fire({
            title: 'Geocerca',
            input: 'text',
            inputLabel: 'Nombre de la geocerca',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Debes escribir algo!'
                }
            }
        })

        if (val) {
            name = val;
        }

    })()

    console.log('geo  ' + name);

    if (name != null && name != '') {


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
        return true;
    }


    return false;
}

function updatePolygonCoords(myPolygon, id) {
    var len = myPolygon.getPath().getLength();
    var htmlStr = "";
    var array = [];

    for (var i = 0; i < len; i++) {
        array.push(myPolygon.getPath().getAt(i).toUrlValue(5))
    }

    $.post('/geocerca/' + id, {

        "datos": array,
        "id": id
    }, function (data) {
        console.log(data);
        Toast.fire({
            icon: 'success',
            title: 'Datos actualizados'
        })
        return true;
    });


    return false;


}