<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

use App\Models\Event;

Route::get('/', function () {
    $featured_events = Event::where('status', 'approved')->take(4)->get();
    return view('home', compact('featured_events'));
});


Route::middleware(['auth'])->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index'); // List event disetujui
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // Form tambah event
    Route::post('/events', [EventController::class, 'store'])->name('events.store'); // Simpan event
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show'); // Detail event
});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/events', [EventController::class, 'adminIndex'])->name('events.index'); // List event pending
    Route::patch('/events/{id}/approve', [EventController::class, 'approve'])->name('events.approve'); // Setujui
    Route::patch('/events/{id}/reject', [EventController::class, 'reject'])->name('events.reject'); // Tolak
});
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
