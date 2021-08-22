<!DOCTYPE html>
<html>

<head>
    <title>Drawing Tools</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <link href="/assets/css/material-dashboard.css" rel="stylesheet" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

</head>

<body onload="checkSize()" onresize="checkSize()">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button id="togglerBtn" class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Iniciar sesión')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Registrarse')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>

                            <li class="dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Cerrar sesión')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
  
        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="./home" class="simple-text logo-normal">
                    Tickets
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active  ">
                        <a class="nav-link" href="./home">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li id="closer" class="nav-item active" onclick="closeNav()">
                        <a class="nav-link" href="#">
                            <i class="material-icons">close</i>
                            <p>Cerrar</p>
                        </a>
                    </li>


                </ul>
            </div>
        </div>


    </div>


    <div id="map">

    </div>



    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDArnwtcfsTpqJ0Y5P_Y8dl-4Ey-j2BWqQ&callback=initMap&libraries=drawing&v=weekly"
        async>
    </script>

    <script>
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
            const map = new google.maps.Map(document.getElementById("map"), {
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
</body>



<!-- Plugin for the Perfect Scrollbar -->
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>





<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.min.js?v=2.1.2" type="text/javascript"></script>

</html>
<?php /**PATH C:\Projects\ticketUI\resources\views/test.blade.php ENDPATH**/ ?>