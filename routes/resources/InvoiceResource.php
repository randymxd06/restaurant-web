<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

/*----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/invoice
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS FACTURAS.
------------------------------------------------------------------*/
Route::group([
    'prefix' => 'invoice',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [InvoiceController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [InvoiceController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [InvoiceController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [InvoiceController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [InvoiceController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [InvoiceController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [InvoiceController::class, 'destroy']);
});
