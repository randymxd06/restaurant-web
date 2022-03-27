<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

/*----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/cities
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS CIUDADES.
------------------------------------------------------------------*/
Route::group([
    'prefix' => 'cities',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CityController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CityController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CityController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CityController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CityController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CityController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CityController::class, 'destroy']);
});
