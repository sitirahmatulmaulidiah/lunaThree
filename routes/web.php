<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;

// Halaman Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman Wisata
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
