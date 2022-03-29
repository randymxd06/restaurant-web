<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodController;

/*---------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/payment-method
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR EL METODO DE PAGO.
-----------------------------------------------------------------------*/
Route::group([
    'prefix' => 'payment-method',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [PaymentMethodController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [PaymentMethodController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [PaymentMethodController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [PaymentMethodController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [PaymentMethodController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [PaymentMethodController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [PaymentMethodController::class, 'destroy']);
});
