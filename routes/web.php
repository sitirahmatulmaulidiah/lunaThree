<?php

use Illuminate\Support\Facades\Route;

// Import semua controller yang akan digunakan
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PengajuanEventController;

// Import semua controller Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\WisataController as AdminWisataController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController; // <-- TAMBAHKAN BARIS INI

// RUTE PUBLIK & UMUM
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

// RUTE UNTUK GUEST (BELUM LOGIN)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// RUTE UNTUK PENGGUNA YANG SUDAH LOGIN
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/pengajuan/buat', [PengajuanEventController::class, 'create'])->name('pengajuan.create');
    Route::post('/pengajuan', [PengajuanEventController::class, 'store'])->name('pengajuan.store');
    Route::get('/profil', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/profil/my-events', [UserProfileController::class, 'myEvents'])->name('profile.myEvents');
});

// RUTE KHUSUS ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Rute untuk CRUD Kategori
    Route::resource('kategori', AdminKategoriController::class)->except('show');

    // Rute Wisata
    Route::resource('wisata', AdminWisataController::class);

    // Rute Event
    Route::get('/event', [AdminEventController::class, 'index'])->name('event.index');
    Route::patch('/event/{event}/approve', [AdminEventController::class, 'approve'])->name('event.approve');
    Route::patch('/event/{event}/reject', [AdminEventController::class, 'reject'])->name('event.reject');
    Route::delete('/event/{event}', [AdminEventController::class, 'destroy'])->name('event.destroy');
});
