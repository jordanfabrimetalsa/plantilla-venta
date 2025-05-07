<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetalleVentas;
use App\Http\Controllers\Productos;
use App\Http\Controllers\Usuarios;
use App\Http\Controllers\Ventas;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/ventas', [Ventas::class, 'index'])->name('ventas');
Route::get('/detalle-venta', [DetalleVentas::class, 'index'])->name('detalle-venta');
Route::get('/categoria', [Categorias::class, 'index'])->name('categoria');
Route::get('/producto', [Productos::class, 'index'])->name('producto');
Route::get('/cliente', [Clientes::class, 'index'])->name('cliente');
Route::get('/usuario', [Usuarios::class, 'index'])->name('usuario');

Route::prefix('ventas')->group(function(){

});
