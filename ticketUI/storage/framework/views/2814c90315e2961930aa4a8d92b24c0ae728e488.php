<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
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

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
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

        <main class="py-4">
            <?php if(Auth::user()): ?>
                <div class="sidebar" data-color="purple" data-background-color="white"
                    data-image="../assets/img/sidebar-1.jpg">
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
                            <li class="nav-item ">
                                <a class="nav-link" href="./user.html">
                                    <i class="material-icons">person</i>
                                    <p>User Profile</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="./mainroutes">
                                    <i class="material-icons">content_paste</i>
                                    <p>Agregar ruta</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="./mapa">
                                    <i class="material-icons">library_books</i>
                                    <p>Agregar geocerca</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="./icons.html">
                                    <i class="material-icons">bubble_chart</i>
                                    <p>Icons</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="./map.html">
                                    <i class="material-icons">location_ons</i>
                                    <p>Maps</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="./notifications.html">
                                    <i class="material-icons">notifications</i>
                                    <p>Notifications</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="./rtl.html">
                                    <i class="material-icons">language</i>
                                    <p>RTL Support</p>
                                </a>
                            </li>
                            <li class="nav-item active-pro ">
                                <a class="nav-link" href="./upgrade.html">
                                    <i class="material-icons">unarchive</i>
                                    <p>Upgrade to PRO</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>

        </main>
    </div>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDArnwtcfsTpqJ0Y5P_Y8dl-4Ey-j2BWqQ&callback=initMap&libraries=drawing&v=weekly"
        async>
    </script>


    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>


    <!-- Plugin for the Perfect Scrollbar -->
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

    <!-- Plugin for the momentJs  -->
    <script src="assets/js/plugins/moment.min.js"></script>

    <!--  Plugin for Sweet Alert -->
    <script src="assets/js/plugins/sweetalert2.js"></script>

    <!-- Forms Validations Plugin -->
    <script src="assets/js/plugins/jquery.validate.min.js"></script>

    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>

    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>

    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="assets/js/plugins/jquery.datatables.min.js"></script>

    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>

    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>

    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="assets/js/plugins/fullcalendar.min.js"></script>

    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="assets/js/plugins/jquery-jvectormap.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="assets/js/plugins/nouislider.min.js"></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!-- Library for adding dinamically elements -->
    <script src="assets/js/plugins/arrive.min.js"></script>

    <!-- Chartist JS -->
    <script src="assets/js/plugins/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.min.js?v=2.1.2" type="text/javascript"></script>


</body>

</html>
<?php /**PATH C:\Projects\ticketUI\resources\views/layouts/app.blade.php ENDPATH**/ ?>