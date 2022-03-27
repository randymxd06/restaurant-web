<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuVsProductController;

/*---------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/menu-vs-products
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR EL MENU Y LOS PRODUCTOS.
-----------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'menu-vs-products',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [MenuVsProductController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [MenuVsProductController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [MenuVsProductController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [MenuVsProductController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [MenuVsProductController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [MenuVsProductController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [MenuVsProductController::class, 'destroy']);
});
