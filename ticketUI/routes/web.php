<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
Route::get('/mainroutes', [App\Http\Controllers\AddMainRouteController::class, 'index'])->name('home');
Route::post('/addPunto', [App\Http\Controllers\AddMainRouteController::class, 'add'])->name('crear');
Route::get('/mapa', [App\Http\Controllers\GeofencesController::class, 'index'])->name('geo');
Route::get('mapaList', [App\Http\Controllers\GeofencesController::class, 'getAll']);
Route::post('/mapapost',[App\Http\Controllers\GeofencesController::class, 'add']);
