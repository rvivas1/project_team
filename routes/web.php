<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\ObsequioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController;


Route::get('/', function () {
    return view('welcome');
});

// ::::::::::::::RUTAS CLIENTE>>>>>>>>>>>>>>>>>
Route::get('/api/cliente',[ClienteController::class,'index']);
Route::post('/api/cliente/registrar',[ClienteController::class,'store']);
Route::put('/api/cliente/actualizar',[ClienteController::class,'update']);
// Route::post('/api/cliente/eliminar',[ClienteController::class,'destroy']);





//  ::::::::::::::ROUTES CRÉDITO>>>>>>>>>>>>>>>
Route::get('/api/credito',[CreditoController::class,'index']);
Route::post('/api/credito/registrar',[CreditoController::class,'store']);
Route::put('/api/credito/actualizar', [CreditoController::class, 'update']);
Route::post('/api/credito/eliminar', [CreditoController::class, 'destroy']);





//  ::::::::::::::ROUTES PRODUCTO>>>>>>>>>>>>>>>
Route::get('/api/producto',[ProductoController::class,'index']);
Route::post('/api/producto/registrar',[ProductoController::class,'store']);
Route::put('/api/producto/actualizar',[ProductoController::class,'update']);
Route::post('/api/producto/eliminar',[ProductoController::class,'destroy']);





//  ::::::::::::::ROUTES OBSEQUIO>>>>>>>>>>>>>>>
Route::get('/api/obsequio',[ObsequioController::class,'index']);
Route::post('/api/obsequio/registrar',[ObsequioController::class,'store']);
Route::put('/api/obsequio/actualizar',[ObsequioController::class,'update']);
Route::post('/api/obsequio/eliminar',[ObsequioController::class,'destroy']);





//  ::::::::::::::ROUTES FACTUTA>>>>>>>>>>>>>>>
Route::get('/api/factura', [FacturaController:: class, 'index']);
Route::post('/api/factura/registrar', [FacturaController:: class, 'store']);
Route::put('/api/factura/actualizar', [FacturaController:: class, 'update']);
Route::post('/api/factura/eliminar', [FacturaController:: class, 'destroy']);