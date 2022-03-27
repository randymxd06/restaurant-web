<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryController;

/*----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/salary
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS SALARIOS.
------------------------------------------------------------------*/
Route::group([
    'prefix' => 'salary',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [SalaryController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [SalaryController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [SalaryController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [SalaryController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [SalaryController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [SalaryController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [SalaryController::class, 'destroy']);
});
