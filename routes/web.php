<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\CocinaController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidosRapidosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\InventarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login ');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

/*---------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/caja
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE CAJA.
-----------------------------------------------------------*/
Route::get('/caja', [CajaController::class, 'index']);
Route::post('/caja', [CajaController::class, 'store']);
Route::get('/caja/{id}', [CajaController::class, 'show']);
Route::put('/caja/{id}', [CajaController::class, 'update']);
Route::delete('/caja/{id}', [CajaController::class, 'destroy']);

/*--------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/recepcion
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE RECEPCION.
----------------------------------------------------------------*/
Route::get('/recepcion', [RecepcionController::class, 'index']);
Route::post('/recepcion', [RecepcionController::class, 'store']);
Route::get('/recepcion/{id}', [RecepcionController::class, 'show']);
Route::put('/recepcion/{id}', [RecepcionController::class, 'update']);
Route::delete('/recepcion/{id}', [RecepcionController::class, 'destroy']);

/*-----------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/cocina
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE COCINA.
-------------------------------------------------------------*/
Route::get('/cocina', [CocinaController::class, 'index']);
Route::post('/cocina', [CocinaController::class, 'store']);
Route::get('/cocina/{id}', [CocinaController::class, 'show']);
Route::put('/cocina/{id}', [CocinaController::class, 'update']);
Route::delete('/cocina/{id}', [CocinaController::class, 'destroy']);

/*----------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/mesas
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE MESAS.
------------------------------------------------------------*/
Route::get('/mesas', [MesasController::class, 'index']);
Route::post('/mesas', [MesasController::class, 'store']);
Route::get('/mesas/{id}', [MesasController::class, 'show']);
Route::put('/mesas/{id}', [MesasController::class, 'update']);
Route::delete('/mesas/{id}', [MesasController::class, 'destroy']);

/*---------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/menu
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE MENU.
-----------------------------------------------------------*/
Route::get('/menu', [MenuController::class, 'index']);
Route::post('/menu', [MenuController::class, 'store']);
Route::get('/menu/{id}', [MenuController::class, 'show']);
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy']);

/*--------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/pedidos-rapidos
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE PEDIDOS RAPIDOS.
----------------------------------------------------------------------*/
Route::get('/pedidos-rapidos', [PedidosRapidosController::class, 'index']);
Route::post('/pedidos-rapidos', [PedidosRapidosController::class, 'store']);
Route::get('/pedidos-rapidos/{id}', [PedidosRapidosController::class, 'show']);
Route::put('/pedidos-rapidos/{id}', [PedidosRapidosController::class, 'update']);
Route::delete('/pedidos-rapidos/{id}', [PedidosRapidosController::class, 'destroy']);

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/reportes
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE REPORTES.
---------------------------------------------------------------*/
Route::get('/reportes', [ReportesController::class, 'index']);
Route::post('/reportes', [ReportesController::class, 'store']);
Route::get('/reportes/{id}', [ReportesController::class, 'show']);
Route::put('/reportes/{id}', [ReportesController::class, 'update']);
Route::delete('/reportes/{id}', [ReportesController::class, 'destroy']);

/*------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/compras
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE COMPRAS.
--------------------------------------------------------------*/
Route::get('/compras', [ComprasController::class, 'index']);
Route::post('/compras', [ComprasController::class, 'store']);
Route::get('/compras/{id}', [ComprasController::class, 'show']);
Route::put('/compras/{id}', [ComprasController::class, 'update']);
Route::delete('/compras/{id}', [ComprasController::class, 'destroy']);

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/inventario
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE REPORTES.
---------------------------------------------------------------*/
Route::get('/inventario', [InventarioController::class, 'index']);
Route::post('/inventario', [InventarioController::class, 'store']);
Route::get('/inventario/{id}', [InventarioController::class, 'show']);
Route::put('/inventario/{id}', [InventarioController::class, 'update']);
Route::delete('/inventario/{id}', [InventarioController::class, 'destroy']);
