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

