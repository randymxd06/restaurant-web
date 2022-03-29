<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;

/*-----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/phones
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TELEFONOS.
-------------------------------------------------------------------*/
Route::group([
    'prefix' => 'phones',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [PhoneController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [PhoneController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [PhoneController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [PhoneController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [PhoneController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [PhoneController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [PhoneController::class, 'destroy']);
});
