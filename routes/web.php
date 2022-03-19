<?php

/*------------------
    IMPORTACIONES
--------------------*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\CocinaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidosRapidosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\SexController;
use App\Http\Controllers\CivilStatuController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\CustomerTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderTypeController;
use App\Http\Controllers\LivingRoomController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TypeReservationController;

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

Route::get('registrarse', function () {
    return view('auth.register');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');


/*--------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/Pantalla-pedidos-rapidos
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE PEDIDOS RAPIDOS.
----------------------------------------------------------------------*/
Route::group([
    'prefix' => 'order_screen',
], function () {
    Route::get('/', [PedidosRapidosController::class, 'create']);
    Route::get('/show/{id}', [PedidosRapidosController::class, 'show']);
    Route::get('/create', [PedidosRapidosController::class, 'create']);
    Route::post('/store', [PedidosRapidosController::class, 'store']);
    Route::get('/edit/{id}', [PedidosRapidosController::class, 'edit']);
    Route::put('/update/{id}', [PedidosRapidosController::class, 'update']);
    Route::delete('/delete/{id}', [PedidosRapidosController::class, 'destroy']);
});


/*---------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/caja
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE CAJA.
-----------------------------------------------------------*/
Route::group([
    'prefix' => 'caja',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CajaController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CajaController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CajaController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CajaController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CajaController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CajaController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CajaController::class, 'destroy']);
});

/*--------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/recepcion
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE RECEPCION.
----------------------------------------------------------------*/
Route::group([
    'prefix' => 'recepcion',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [RecepcionController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [RecepcionController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [RecepcionController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [RecepcionController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [RecepcionController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [RecepcionController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [RecepcionController::class, 'destroy']);
});

/*-----------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/cocina
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE COCINA.
-------------------------------------------------------------*/
Route::group([
    'prefix' => 'cocina',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CocinaController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CocinaController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CocinaController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CocinaController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CocinaController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CocinaController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CocinaController::class, 'destroy']);
});

/*---------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/menu
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE MENU.
-----------------------------------------------------------*/
Route::group([
    'prefix' => 'menu',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [MenuController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [MenuController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [MenuController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [MenuController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [MenuController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [MenuController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [MenuController::class, 'destroy']);
});


/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/reportes
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE REPORTES.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'reportes',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ReportesController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ReportesController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ReportesController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ReportesController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ReportesController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ReportesController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ReportesController::class, 'destroy']);
});

/*------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/compras
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE COMPRAS.
--------------------------------------------------------------*/
Route::group([
    'prefix' => 'compras',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ComprasController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ComprasController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ComprasController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ComprasController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ComprasController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ComprasController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ComprasController::class, 'destroy']);
});

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/inventario
    DESCRIPCION: ESTAS SON LAS RUTAS DEL MODULO DE INVENTARIO.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'inventario',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [InventarioController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [InventarioController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [InventarioController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [InventarioController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [InventarioController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [InventarioController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [InventarioController::class, 'destroy']);
});

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/sex
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS SEXOS.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'sex',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [SexController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [SexController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [SexController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [SexController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [SexController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [SexController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [SexController::class, 'destroy']);
});

/*-----------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/civil_status
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS ESTADOS CIVILES.
-------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'civil_status',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CivilStatuController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CivilStatuController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CivilStatuController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CivilStatuController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CivilStatuController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CivilStatuController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CivilStatuController::class, 'destroy']);
});

/*----------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/nationality
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS NACIONALIDADES.
------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'nationality',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [NationalityController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [NationalityController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [NationalityController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [NationalityController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [NationalityController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [NationalityController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [NationalityController::class, 'destroy']);
});

/*-----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/entities
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS ENTIDADES.
-------------------------------------------------------------------*/
Route::group([
    'prefix' => 'entities',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [EntityController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [EntityController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [EntityController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [EntityController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [EntityController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [EntityController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [EntityController::class, 'destroy']);
});

/*-----------------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/product_category
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS CATEGORIAS DE LOS PRODUCTOS.
-------------------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'product_category',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProductCategoryController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ProductCategoryController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ProductCategoryController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ProductCategoryController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ProductCategoryController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ProductCategoryController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ProductCategoryController::class, 'destroy']);
});

/*-----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/products
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS PRODUCTOS.
-------------------------------------------------------------------*/
Route::group([
    'prefix' => 'products',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProductController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ProductController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ProductController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ProductController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ProductController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ProductController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ProductController::class, 'destroy']);
});

/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/box
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS CAJAS.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'box',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [BoxController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [BoxController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [BoxController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [BoxController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [BoxController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [BoxController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [BoxController::class, 'destroy']);
});

/*-------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/customer_type
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE CLIENTES.
---------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'customer_type',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CustomerTypeController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CustomerTypeController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CustomerTypeController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CustomerTypeController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CustomerTypeController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CustomerTypeController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CustomerTypeController::class, 'destroy']);
});

/*----------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/customer
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS CLIENTES.
------------------------------------------------------------------*/
Route::group([
    'prefix' => 'customer',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [CustomerController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [CustomerController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [CustomerController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [CustomerController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [CustomerController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [CustomerController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [CustomerController::class, 'destroy']);
});

/*------------------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/order_type
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS TIPOS DE ORDENES.
--------------------------------------------------------------------------*/
Route::group([
    'prefix' => 'order_type',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [OrderTypeController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [OrderTypeController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [OrderTypeController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [OrderTypeController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [OrderTypeController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [OrderTypeController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [OrderTypeController::class, 'destroy']);
});

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/living_room
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LOS SALONES.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'livingrooms',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [LivingRoomController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [LivingRoomController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [LivingRoomController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [LivingRoomController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [LivingRoomController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [LivingRoomController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [LivingRoomController::class, 'destroy']);
});
/*-------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/mesas
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS MESAS.
---------------------------------------------------------------*/
Route::group([
    'prefix' => 'tables',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [TableController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [TableController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [TableController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [TableController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [TableController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [TableController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [TableController::class, 'destroy']);
});

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/orders
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS ORDENES.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'orders',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [OrderController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [OrderController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [OrderController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [OrderController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [OrderController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [OrderController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [OrderController::class, 'destroy']);
});

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/type-reservation
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS ORDENES.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'type-reservation',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [TypeReservationController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [TypeReservationController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [TypeReservationController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [TypeReservationController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [TypeReservationController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [TypeReservationController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [TypeReservationController::class, 'destroy']);
});

/*---------------------------------------------------------------
    RUTA BASE: http://127.0.0.1:8000/reservation
    DESCRIPCION: ESTAS SON LAS RUTAS PARA MANEJAR LAS ORDENES.
-----------------------------------------------------------------*/
Route::group([
    'prefix' => 'reservation',
], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', [ReservationController::class, 'index']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/show/{id}', [ReservationController::class, 'show']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/create', [ReservationController::class, 'create']);
    Route::middleware(['auth:sanctum', 'verified'])->post('/store', [ReservationController::class, 'store']);
    Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', [ReservationController::class, 'edit']);
    Route::middleware(['auth:sanctum', 'verified'])->put('/update/{id}', [ReservationController::class, 'update']);
    Route::middleware(['auth:sanctum', 'verified'])->delete('/delete/{id}', [ReservationController::class, 'destroy']);
});