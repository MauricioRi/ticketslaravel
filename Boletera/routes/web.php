<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers as Ctr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    //return view('/auth/login');
    return redirect('/login');
});
Route::get('logout', function () {
    Session::flush();
    Session::regenerate();

    return redirect('/');
});

Route::get('inicio', [Ctr\HomeController::class, 'inicio'])->name('inicio')->middleware('auth');//layouts/without-menu

// Administrador
Route::any('gestion-usuarios', [Ctr\Admin\UserController::class, 'admUsers'])->name('gestion-usuarios')->middleware('auth');
Route::any('act-usr', [Ctr\Admin\UserController::class, 'enableUsr'])->name('act-usr')->middleware('auth');
Route::any('new-usr', [Ctr\Admin\UserController::class, 'createUsr'])->name('new-usr')->middleware('auth');
Route::any('acciones-usuario/{action?}/{id?}', [Ctr\Admin\UserController::class, 'actionsUser'])->name('acciones-usuario')->middleware('auth');
// Fin administrador

// locale Route
Route::get('lang/{locale}', [Ctr\LanguageController::class, 'swap']);


Route::any('geocercas', [Ctr\Geocercas::class, 'geocercas'])->name('geocercas')->middleware('auth');
Route::any('acciones-geocerca/{action?}/{id?}', [Ctr\Geocercas::class, 'actionsGeofences'])->name('acciones-geocerca')->middleware('auth');
Route::any('crear-geocercas', [Ctr\Geocercas::class, 'creargeocercas'])->name('crear-geocercas')->middleware('auth');
Route::post('geocerca', [Ctr\Geocercas::class, 'crear'])->name('geocercas.create');
Route::post('/geocerca/{id}', [Ctr\Geocercas::class, 'actualizar'])->name('geocercas.update');

//Empresas
Route::any('empresas', [Ctr\Empresas::class, 'empresas'])->name('empresas')->middleware('auth');
Route::any('acciones-empresa/{action?}/{id?}', [Ctr\Empresas::class, 'actionsCompanies'])->name('acciones-empresa')->middleware('auth');
Route::any('crear-empresa', [Ctr\Empresas::class, 'crearempresa'])->name('crearempresa')->middleware('auth');
Route::any('nuevaempresa', [Ctr\Empresas::class, 'createCompany'])->name('new-company')->middleware('auth');
Route::post('/empresa/{id}', [Ctr\Empresas::class, 'actualizar'])->name('empresas.update');
Route::post('/empresa', [Ctr\Empresas::class, 'crear'])->name('empresas.create');

//Usuarios de empresas
Route::any('usuarios', [Ctr\Usuarios::class, 'usuarios'])->name('usuarios')->middleware('auth');
Route::any('actusr', [Ctr\Usuarios::class, 'enableUsr'])->name('actusr')->middleware('auth');
Route::any('newusr', [Ctr\Usuarios::class, 'createUsr'])->name('newusr')->middleware('auth');
Route::any('accionesusuario/{action?}/{id?}', [Ctr\Usuarios::class, 'actionsUser'])->name('accionesusuario')->middleware('auth');

//Choferes
Route::any('choferes', [Ctr\Choferes::class, 'choferes'])->name('choferes')->middleware('auth');
Route::any('accioneschoferes/{action?}/{id?}', [Ctr\Choferes::class, 'actionsChoferes'])->name('acciones-choferes')->middleware('auth');
Route::any('choferes/nuevo', [Ctr\Choferes::class, 'nuevoChofer'])->name('nuevo-Chofer')->middleware('auth');
Route::any('newchofer', [Ctr\Choferes::class, 'createChofer'])->name('newchofer')->middleware('auth');
Route::any('actchf', [Ctr\Choferes::class, 'enableChf'])->name('actchf')->middleware('auth');

Route::any('unidades', [Ctr\Unidades::class, 'unidades'])->name('unidades')->middleware('auth');
Route::any('accionesunidades/{action?}/{id?}', [Ctr\Unidades::class, 'actionsUnidades'])->name('acciones-unidades')->middleware('auth');
Route::any('unidades/nuevo', [Ctr\Unidades::class, 'nuevoUnidad'])->name('nuevo-Unidad')->middleware('auth');
Route::any('newunidad', [Ctr\Unidades::class, 'createUnidad'])->name('newunidad')->middleware('auth');
Route::any('actund', [Ctr\Unidades::class, 'enableUnd'])->name('actund')->middleware('auth');
Route::any('listar', [Ctr\Rutas::class, 'listar'])->name('listar')->middleware('auth');
// Route::get('/rutas_crear', [RutasController::class, 'store'])->name("rutasstore");
// Route::post("cursos", [RutasController::class, "store"])->name("rutasstore");

//Asignacion
Route::any('accionesasignacion/{action?}/{id?}', [Ctr\Vincular::class, 'actionsUnidades'])->name('acciones-asignaciones')->middleware('auth');
Route::any('choferes-unidades', [Ctr\Vincular::class, 'choferesunidades'])->name('choferes-unidades')->middleware('auth');
Route::any('asiguni', [Ctr\Vincular::class, 'asignarUnidad'])->name('asigunidad')->middleware('auth');
//Rutas
Route::any('rutas', [Ctr\Rutas::class, 'listar'])->name('rutas')->middleware('auth');
Route::any('/nueva', [Ctr\Rutas::class, 'crear'])->name('crear-rutas')->middleware('auth');
Route::any('accionesruta/{action?}/{id?}', [Ctr\Rutas::class, 'accionesruta'])->name('accionesruta')->middleware('auth');
Route::any('rutasupdate/{route}', [Ctr\Rutas::class, 'update'])->name('rutasupdate')->middleware('auth');

Route::any('rutascrear', [Ctr\Rutas::class, 'crear'])->name('rutascrear')->middleware('auth');

Route::any('rutasguardar', [Ctr\Rutas::class, 'store'])->name('rutasstore')->middleware('auth');
Route::any('crear', [Ctr\Rutas::class, 'crear'])->name('crear')->middleware('auth');
Route::any('nueva-ruta', [Ctr\Rutas::class, 'crear'])->name('nueva-ruta')->middleware('auth');
//api

Route::any('api/test', function () {
    Log::debug("test on web ");
});


Route::get('api/getToken', function () {
    return ["Token"=>csrf_token()];
});

Route::get('api/check', function () {
    if (Auth::check()) {
        return response()->json([
            'message' => 'Logged'
            ], 200);
    } else {
        return response()->json([
            'message' => 'Unauthorized'
            ], 401);
    }
});

Route::post('api/inicio_sesion', [Ctr\ApiController::class, 'login']);

Route::any('api/cerrar_sesion', [Ctr\ApiController::class, 'logout']);

Route::get('api/precios/{ruta}', [Ctr\ApiController::class, 'listarPrecios']);

Route::get('api/geocercas/{ruta?}', [Ctr\ApiController::class, 'listarGeocercas']);

Route::get('api/rutas', [Ctr\ApiController::class, 'listarRutas']);

Route::post('api/estado-pasajeros', [Ctr\Reportes::class, 'reportes_pasajeros']);

Route::post('api/reportes-egresos', [Ctr\Reportes::class, 'reportes_egresos']);



Route::get('api/tipos-egresos', [Ctr\Reportes::class, 'tipos_egresos']);