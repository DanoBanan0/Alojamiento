<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlojamientoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserAlojamientoController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AlojamientoController::class, 'index'])->name('landing.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/alojamientos/{alojamiento}/toggle', [UserAlojamientoController::class, 'toggle'])->middleware(['auth'])->name('alojamientos.toggle');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
