<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlojamientoController;

// Route::get('/', function () {
//     return view('welcome');
// });

//aqui estoy definiendo la landing page
Route::get('/', [AlojamientoController::class, 'index'])->name('landing.index');
