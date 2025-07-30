<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetalleVentasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VentasController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


//Crear un usuario admin, solo usar una vez
//Route::get('/crear-admin', [AuthController::class, 'crearAdmin']);

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

Route::middleware("auth")->group(function(){
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('categorias')->group(function(){
    Route::get('/', [CategoriasController::class, 'index'])->name('categorias');
    Route::get('/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/store', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('/show{id}', [CategoriasController::class, 'show'])->name('categorias.show');
    Route::get('/edit/{id}', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('/update/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
    Route::delete('/destroy/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
    });


Route::prefix('/proveedores')->middleware('auth')->group(function(){
    Route::get('/', [ProveedoresController::class, 'index'])->name('proveedores');
    Route::get('/create', [ProveedoresController::class, 'create'])->name('proveedores.create');
    Route::post('/store', [ProveedoresController::class, 'store'])->name('proveedores.store');
    Route::get('/edit/{id}', [ProveedoresController::class, 'edit'])->name('proveedores.edit');
    Route::put('/update/{id}', [ProveedoresController::class, 'update'])->name('proveedores.update');
    Route::get('/show{id}', [ProveedoresController::class, 'show'])->name('proveedores.show');
    Route::delete('/destroy{id}', [ProveedoresController::class, 'destroy'])->name('proveedores.destroy');
});

Route::prefix('/productos')->middleware('auth')->group(function(){
    Route::get('/', [ProductosController::class, 'index'])->name('productos');
    Route::get('/create', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('/store', [ProductosController::class, 'store'])->name('productos.store');
    Route::get('/edit/{id}', [ProductosController::class, 'edit'])->name('productos.edit');
    Route::put('/update/{id}', [ProductosController::class, 'update'])->name('productos.update');
    Route::get('/show{id}', [ProductosController::class, 'show'])->name('productos.show');
    Route::delete('/destroy{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');
});


Route::prefix('usuarios')->middleware('auth')->group(function(){
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');
    Route::get('/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/store', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/edit/{id}', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/update/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::get('/tbody', [UsuariosController::class, 'tbody'])->name('usuarios.tbody');
    Route::get('/cambiar-estado/{id}/{estado}', [UsuariosController::class, 'estado'])->name('usuarios.estado');
    Route::get('/cambiar-password/{id}/{password}', [UsuariosController::class, 'cambio_password'])->name('usuarios.password');
});


Route::prefix('ventas')->middleware('auth')->group(function(){
    Route::get('/nueva-venta', [VentasController::class, 'index'])->name('ventas-nueva');
});

Route::prefix('detalle')->group(function(){
    Route::get('/detalle-venta', [DetalleVentasController::class, 'index'])->name('detalle-venta');
});