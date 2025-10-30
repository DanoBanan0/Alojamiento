<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlojamientoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserAlojamientoController;
use App\Http\Controllers\Admin\AlojamientoAdminController;
use Illuminate\Support\Facades\Route;

// Ruta landing
Route::get('/', [AlojamientoController::class, 'index'])->name('landing.index');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Toggle alojamiento para usuarios
Route::post('/alojamientos/{alojamiento}/toggle', [UserAlojamientoController::class, 'toggle'])
    ->middleware(['auth'])
    ->name('alojamientos.toggle');

// Perfil de usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de administrador
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('alojamientos', AlojamientoAdminController::class)->except(['destroy']);

    // Rutas extra para toggle de activo y destacado
    Route::patch('alojamientos/{alojamiento}/toggle-activo', [AlojamientoAdminController::class, 'toggleActivo'])
        ->name('alojamientos.toggleActivo');

    Route::patch('alojamientos/{alojamiento}/toggle-destacado', [AlojamientoAdminController::class, 'toggleDestacado'])
        ->name('alojamientos.toggleDestacado');
});

// Auth routes
require __DIR__ . '/auth.php';