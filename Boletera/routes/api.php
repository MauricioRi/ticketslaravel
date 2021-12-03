<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers as Ctr;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::any('test', function () {
    Log::debug("test on web ");
});


Route::get('getToken', function () {
    return ["Token" => csrf_token()];
});

//api

Route::any('test', function () {
    Log::debug("test on web ");
});


Route::get('getToken', function () {
    return ["Token" => csrf_token()];
});

Route::get('check', [Ctr\GenericController::class, 'check'])->middleware('auth:api');

Route::get('check-connection', function () {
    return 'ok';
});


Route::post('inicio_sesion', [Ctr\ApiController::class, 'login']);

Route::any('cerrar_sesion', [Ctr\ApiController::class, 'logout']);

Route::get('precios/{ruta}', [Ctr\ApiController::class, 'listarPrecios'])->middleware('auth:api');

Route::get('geocercas/{ruta?}', [Ctr\ApiController::class, 'listarGeocercas'])->middleware('auth:api');

Route::get('rutas', [Ctr\ApiController::class, 'listarRutas'])->middleware('auth:api');



Route::post('reportes-egresos', [Ctr\Reportes::class, 'reportes_egresos'])->middleware('auth:api');

Route::post('reportes-egresos', [Ctr\Reportes::class, 'addimage'])->name('reportes-egresos')->middleware('auth:api');

Route::get('tipos-egresos', [Ctr\Reportes::class, 'tipos_egresos'])->middleware('auth:api');

Route::post('testImg', [Ctr\Reportes::class, 'addimage'])->name('image.upload.post')->middleware('auth:api');

Route::post('reportes-pasajeros', [Ctr\Reportes::class, 'reportes_pasajeros'])->name('reportes-pasajeros')->middleware('auth:api');


