<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetalleVentasController;
use App\Http\Controllers\ProductosController;
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
    Route::delete('/destroy/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
    Route::get('/edit/{id}', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('/update/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
    });

Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes');
Route::get('/productos', [ProductosController::class, 'index'])->name('productos');

Route::prefix('usuarios')->middleware('auth')->group(function(){
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');
    Route::get('/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/store', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/edit/{id}', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/update/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::get('/tbody', [UsuariosController::class, 'tbody'])->name('usuarios.tbody');
});


Route::prefix('ventas')->middleware('auth')->group(function(){
    Route::get('/nueva-venta', [VentasController::class, 'index'])->name('ventas-nueva');
});

Route::prefix('detalle')->group(function(){
    Route::get('/detalle-venta', [DetalleVentasController::class, 'index'])->name('detalle-venta');
});