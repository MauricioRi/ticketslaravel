<?php

use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\GeocercasController;
use App\Http\Controllers\MisUsuariosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Custom
Route::get('/usuario/{id?}', [UsuariosController::class, 'editar'])->name('usuarios.edit');
Route::get('/usuarios', [UsuariosController::class, 'cargar'])->name('usuarios.list');
Route::post('/usuario', [UsuariosController::class, 'crear'])->name('usuarios.create');
Route::post('/usuario/{id}', [UsuariosController::class, 'actualizar'])->name('usuarios.update');

Route::get('/miusuario/{id?}', [MisUsuariosController::class, 'editar'])->name('misusuarios.edit');
Route::get('/misusuarios', [MisUsuariosController::class, 'cargar'])->name('misusuarios.list');
Route::post('/miusuario', [MisUsuariosController::class, 'crear'])->name('misusuarios.create');
Route::post('/miusuario/{id}', [MisUsuariosController::class, 'actualizar'])->name('misusuarios.update');


Route::get('/empresa/{id?}', [EmpresasController::class, 'editar'])->name('empresas.edit');
Route::get('/empresas', [EmpresasController::class, 'cargar'])->name('empresas.list');
Route::post('/empresa', [EmpresasController::class, 'crear'])->name('empresas.create');
Route::post('/empresa/{id}', [EmpresasController::class, 'actualizar'])->name('empresas.update');

Route::get('/geocerca/{id?}', [GeocercasController::class, 'editar'])->name('geocercas.edit');
Route::get('/geocercas', [GeocercasController::class, 'cargar'])->name('geocercas.list');
Route::post('/geocerca', [GeocercasController::class, 'crear'])->name('geocercas.create');
Route::delete('/geocerca/{id}', [GeocercasController::class, 'eliminar'])->name('geocercas.delete');
Route::post('/geocerca/{id}', [GeocercasController::class, 'actualizar'])->name('geocercas.update');
Route::get('listarGeocercas', [GeocercasController::class, 'listar']);