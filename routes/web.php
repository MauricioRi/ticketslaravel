<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\LoginController;
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

 


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login/{ruta}', [LoginController::class,'login'])->name("login");
Route::get('/rutas', [RutasController::class,'listar'])->name("listar_Rutas");
Route::get('/rutas_crear', [RutasController::class,'crear'])->name("crear_Rutas");
Route::get('/rutas_editar/{idruta}', [RutasController::class,'editar'])->name("editar_Rutas");

Route::post("cursos",[RutasController::class ,"store"])->name("rutas.store");
Route::put("rutas_update/{route}",[RutasController::class ,"update"])->name("rutas_update");