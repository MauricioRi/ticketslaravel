<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers as Ctr;
use Illuminate\Support\Facades\Auth;
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