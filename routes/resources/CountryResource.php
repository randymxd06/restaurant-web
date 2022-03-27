<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

/*--------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/countries
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS PAISES.
----------------------------------------------------------------*/
Route::group([
    'prefix' => 'countries',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CountryController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CountryController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CountryController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CountryController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CountryController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CountryController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CountryController::class, 'destroy']);
});
