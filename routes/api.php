<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BebidasController;
use App\Http\Controllers\Api\LanchesController;
use App\Http\Controllers\Api\PedidosController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('get-user', [AuthController::class, 'userDetail']);
});

Route::apiResource('/usuarios', UserController::class);
Route::apiResource('/lanches', LanchesController::class);
Route::apiResource('/bebidas', BebidasController::class);
Route::apiResource('/pedidos', PedidosController::class);