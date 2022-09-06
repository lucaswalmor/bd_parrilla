<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BebidasController;
use App\Http\Controllers\Api\Filtros;
use App\Http\Controllers\Api\IngredientesController;
use App\Http\Controllers\Api\LanchesController;
use App\Http\Controllers\Api\PedidosController;
use App\Http\Controllers\Api\TaxaEntregaController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('get-user', [AuthController::class, 'userDetail']);
});

Route::apiResource('/usuarios', UserController::class);
Route::apiResource('/lanches', LanchesController::class);
Route::apiResource('/bebidas', BebidasController::class);
Route::apiResource('/pedidos', PedidosController::class);
Route::apiResource('/taxa_entrega', TaxaEntregaController::class);
Route::apiResource('/filtros', Filtros::class);
Route::apiResource('/ingredientes', IngredientesController::class);

Route::apiResource('/upload', UploadController::class);