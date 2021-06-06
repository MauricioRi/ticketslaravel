<?php

use App\Http\Controllers\AddMainRouteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeocercasController;
use App\Http\Controllers\GeofencesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoutasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\RutasController;

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
Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/rutas', [RutasController::class, 'listar'])->name("listar_Rutas");
Route::get('/rutas_crear', [RutasController::class, 'crear'])->name("crear_Rutas");
Route::get('/rutas_editar/{idruta}', [RutasController::class, 'editar'])->name("editar_Rutas");

Route::post("cursos", [RutasController::class, "store"])->name("rutas.store");
Route::put("rutas_update/{route}", [RutasController::class, "update"])->name("rutas_update");

Route::get('/home', [DashboardController::class, 'index']);
Route::post('/addPunto', [AddMainRouteController::class, 'add'])->name('crear');
Route::get('/mapa', [GeocercasController::class, 'index'])->name('geo');
Route::get('mapaList', [GeofencesController::class, 'getAll']);
Route::post('/mapapost', [GeofencesController::class, 'add']);