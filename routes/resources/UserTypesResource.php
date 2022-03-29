<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserTypeController;

/*-------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/user-types
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE USUARIOS.
---------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'user-types',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [UserTypeController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [UserTypeController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [UserTypeController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [UserTypeController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [UserTypeController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [UserTypeController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [UserTypeController::class, 'destroy']);
});
