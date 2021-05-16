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
Route::get('/',HomeController::class);
//Route::get('/','HomeController'); para laravel 7
Route::get('/login/{var}', [LoginController::class,'login']);
//Route::get('/rutas', 'RutasController@index'); para laravel 7 7
Route::get('/rutas/create', [RutasController::class,'create']);
Route::get('/rutas/{idruta}', [RutasController::class,'show']);

// Route::get('/', function () {
//     return view('welcome');
    
// });
// Route::get('/', function () {
//     return view('welcome');
    
// });