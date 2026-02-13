<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', function () {
    return view('beranda');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/program', function () {
    return view('program');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/kontak', function () {
    return view('kontak');
});

// Message Routes
Route::post('/kirim-pesan', [MessageController::class, 'store'])->name('messages.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Messages Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/admin/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/admin/messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.mark-as-read');
    Route::delete('/admin/messages/{message}', [MessageController::class, 'delete'])->name('messages.delete');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
