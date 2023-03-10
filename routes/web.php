<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdderesController;

Route::get('/', [AdderesController::class, 'index'])->name('home');
Route::get('/buscar', [AdderesController::class, 'buscar'])->name('buscar');