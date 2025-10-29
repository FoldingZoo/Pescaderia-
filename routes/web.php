<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController; // 🔹 Importamos el controlador de categorías

// 🔹 Página principal: redirige al login si no hay sesión
Route::get('/', [LoginController::class, 'showLogin'])->name('login');

// 🔹 Procesar login simulado
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// 🔹 Cerrar sesión
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// 🔹 Rutas de productos (protegidas desde el controlador)
Route::resource('productos', ProductoController::class);

// 🔹 Rutas de categorías
Route::resource('categorias', CategoriaController::class);
