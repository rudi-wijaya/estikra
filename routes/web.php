<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', function () {
    $beritas = \App\Models\Berita::where('status', 'published')->orderBy('tanggal_terbit', 'desc')->limit(3)->get();
    $galeris = \App\Models\Galeri::where('status', 'aktif')->orderBy('tanggal_upload', 'desc')->limit(3)->get();
    return view('beranda', compact('beritas', 'galeris'));
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/program', function () {
    return view('program');
});

Route::get('/guru-staff', function () {
    return view('guru-staff');
});

Route::get('/berita', function () {
    $beritas = \App\Models\Berita::where('status', 'published')->orderBy('tanggal_terbit', 'desc')->paginate(9);
    return view('berita', compact('beritas'));
});

Route::get('/galeri', function () {
    $galeris = \App\Models\Galeri::where('status', 'aktif')->orderBy('tanggal_upload', 'desc')->paginate(12);
    return view('galeri', compact('galeris'));
});

Route::get('/kontak', function () {
    return view('kontak');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Users
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        
        // Beritas
        Route::resource('beritas', \App\Http\Controllers\Admin\BeritaController::class);

        // Galeris
        Route::resource('galeris', \App\Http\Controllers\Admin\GaleriController::class);

        // Settings
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    });

    // Also create alias for home redirect
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

