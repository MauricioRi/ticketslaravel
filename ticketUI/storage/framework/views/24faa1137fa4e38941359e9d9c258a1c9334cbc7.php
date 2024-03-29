

<?php $__env->startSection('content'); ?>

    <div class="wrapper">

        <div class="main-panel">
            <button onclick="loadGeocercas()">Ver geocercas</button>
            <div id="map">

            </div>
        </div>
    </div>



    <script>
        var map;
        var poligonos = [];

        function loadGeocercas() {
            poligonos.forEach(function(p) {
                p.setMap(null);
            });
            poligonos=[];
            $.get('mapaList', function(data) {
                for (i = 0; i < data.length; i++) {
                    var datos = data[i].datos;
                    paths = [];

                    var json = JSON.parse(datos);
                    json.forEach(function(entry) {
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
                    });
                    polygon.setMap(map);
                    poligonos.push(polygon);

                }
            })
        }

        function checkSize() {
            let viewport = $('#sizer').find('div:visible').data('size');

            if (viewport != 'xs' && viewport != 'sm' && viewport != 'md') {
                document.getElementById('closer').style.display = "none";
            } else {
                document.getElementById('closer').style.display = "block";
            }

        }


        function closeNav() {
            document.getElementById('togglerBtn').click()
        }
        // Initialize and add the map
        function initMap() {

            // The map, centered at Uluru
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: new google.maps.LatLng(36.236797, -112.956333),
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
                    editable: true,
                    zIndex: 1,
                },
            });
            drawingManager.setMap(map);

            google.maps.event.addListener(drawingManager, 'overlaycomplete', function(polygon) {
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

        function getPolygonCoords(myPolygon) {
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

            var name = prompt('Nombre d ela geocerca');
            if (name != null && name != '') {


                $.post('mapapost', {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "datos": array,
                    "name": name
                }, function(data) {
                    console.log(data);
                });
                return true;
            }


            return false;


        }

    </script>
    <style>
        #map {
            height: 95%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>

    <div id="sizer">
        <div class="d-block d-sm-none d-md-none d-lg-none d-xl-none" data-size="xs"></div>
        <div class="d-none d-sm-block d-md-none d-lg-none d-xl-none" data-size="sm"></div>
        <div class="d-none d-sm-none d-md-block d-lg-none d-xl-none" data-size="md"></div>
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-none" data-size="lg"></div>
        <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block" data-size="xl"></div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\GitHub\ticketslaravel\ticketUI\resources\views/geofences.blade.php ENDPATH**/ ?>