<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

/*-----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/companies
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS COMPAÑIAS.
-------------------------------------------------------------------*/
Route::group([
    'prefix' => 'companies',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CompanyController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CompanyController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CompanyController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CompanyController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CompanyController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CompanyController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CompanyController::class, 'destroy']);
});
