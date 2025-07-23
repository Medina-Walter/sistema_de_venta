<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetalleVentasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::prefix('categorias')->group(function(){
    Route::get('/', [CategoriasController::class, 'index'])->name('categorias');
});


Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes');
Route::get('/productos', [ProductosController::class, 'index'])->name('productos');
Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios');

Route::prefix('ventas')->group(function(){
    Route::get('/nueva-venta', [VentasController::class, 'index'])->name('ventas-nueva');
});


Route::prefix('detalle')->group(function(){
    Route::get('/detalle-venta', [DetalleVentasController::class, 'index'])->name('detalle-nueva');
});
