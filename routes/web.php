<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\GuruStaffController;
use App\Http\Controllers\Admin\PpdbController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', function () {
    $beritas = \App\Models\Berita::where('status', 'published')->orderBy('tanggal_terbit', 'desc')->limit(3)->get();
    $galeris = \App\Models\Galeri::where('status', 'aktif')->orderBy('tanggal_upload', 'desc')->limit(3)->get();
    $guruStaffs = \App\Models\GuruStaff::aktif()->where('kategori', '!=', 'kepala_sekolah')->orderBy('urutan')->orderBy('nama')->get();
    $programs = \App\Models\Program::orderByDesc('created_at')->limit(3)->get();
    return view('beranda', compact('beritas', 'galeris', 'guruStaffs', 'programs'));
});

Route::get('/tentang', function () {
    $prestasis = \App\Models\Prestasi::where('status', 'aktif')
        ->orderBy('urutan')
        ->orderByDesc('created_at')
        ->get();

    return view('tentang', compact('prestasis'));
});

Route::get('/prestasi', function () {
    $prestasis = \App\Models\Prestasi::where('status', 'aktif')
        ->orderBy('urutan')
        ->orderByDesc('created_at')
        ->paginate(9);

    return view('prestasi', compact('prestasis'));
})->name('prestasi.index');

Route::get('/program', function () {
    $programs = \App\Models\Program::all();
    return view('program', compact('programs'));
});

Route::get('/program/{program}', function (\App\Models\Program $program) {
    $lainnya = \App\Models\Program::where('id', '!=', $program->id)
        ->orderByDesc('created_at')
        ->limit(3)
        ->get();

    return view('program-detail', compact('program', 'lainnya'));
})->name('program.show');

Route::get('/guru-staff', function () {
    $guruStaffs = \App\Models\GuruStaff::aktif()->orderBy('urutan')->orderBy('nama')->get()->groupBy('kategori');
    return view('guru-staff', compact('guruStaffs'));
});

Route::get('/berita', function () {
    $beritas = \App\Models\Berita::where('status', 'published')->orderBy('tanggal_terbit', 'desc')->paginate(9);
    return view('berita', compact('beritas'));
});

Route::get('/berita/{berita:slug}', function (\App\Models\Berita $berita) {
    abort_if($berita->status !== 'published', 404);
    $lainnya = \App\Models\Berita::where('status', 'published')
        ->where('id', '!=', $berita->id)
        ->orderBy('tanggal_terbit', 'desc')
        ->limit(3)
        ->get();
    return view('berita-detail', compact('berita', 'lainnya'));
})->name('berita.show');

Route::get('/galeri', function () {
    $galeris = \App\Models\Galeri::where('status', 'aktif')->orderBy('tanggal_upload', 'desc')->paginate(12);
    return view('galeri', compact('galeris'));
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/ppdb', function () {
    $dokumen = \App\Models\PpdbItem::aktif()->where('type', 'dokumen')->orderBy('urutan')->get();
    $alur    = \App\Models\PpdbItem::aktif()->where('type', 'alur')->orderBy('urutan')->get();
    return view('ppdb', compact('dokumen', 'alur'));
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Admin Routes
    Route::get('/admin', fn() => redirect()->route('admin.dashboard'));

    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Users
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        
        // Beritas
        Route::resource('beritas', \App\Http\Controllers\Admin\BeritaController::class);

        // Galeris
        Route::resource('galeris', \App\Http\Controllers\Admin\GaleriController::class);

        // Guru Staffs
        Route::resource('guru-staffs', GuruStaffController::class);

        // Programs
        Route::resource('programs', \App\Http\Controllers\Admin\ProgramController::class);

        // Prestasis
        Route::resource('prestasis', \App\Http\Controllers\Admin\PrestasiController::class)->except(['show']);

        // Settings
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
        Route::get('settings/tentang', [SettingController::class, 'tentang'])->name('settings.tentang.index');
        Route::put('settings/tentang', [SettingController::class, 'updateTentang'])->name('settings.tentang.update');

        // PPDB
        Route::get('ppdb', [PpdbController::class, 'index'])->name('ppdb.index');
        Route::put('ppdb/settings', [PpdbController::class, 'updateSettings'])->name('ppdb.settings.update');
        Route::get('ppdb/create', [PpdbController::class, 'create'])->name('ppdb.create');
        Route::post('ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
        Route::get('ppdb/{ppdb}/edit', [PpdbController::class, 'edit'])->name('ppdb.edit');
        Route::put('ppdb/{ppdb}', [PpdbController::class, 'update'])->name('ppdb.update');
        Route::delete('ppdb/{ppdb}', [PpdbController::class, 'destroy'])->name('ppdb.destroy');
    });

    // Also create alias for home redirect
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

