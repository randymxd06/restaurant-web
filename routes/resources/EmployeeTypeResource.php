<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeTypeController;

/*--------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/employee-types
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE EMPLEADOS.
----------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'employee-types',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [EmployeeTypeController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [EmployeeTypeController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [EmployeeTypeController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [EmployeeTypeController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [EmployeeTypeController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [EmployeeTypeController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [EmployeeTypeController::class, 'destroy']);
});
