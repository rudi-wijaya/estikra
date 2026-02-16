<?php

/*
 * ADMIN ROUTES
 * 
 * Add these routes to your routes/web.php file
 * Make sure to import the controllers at the top
 */

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;

// Admin routes - requires authentication and admin role
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users Management
    Route::resource('users', UserController::class);

    // Messages Management
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
    Route::post('/messages/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');

});

/*
 * EXAMPLE OF COMPLETE routes/web.php:
 * 
 * <?php
 * 
 * use App\Http\Controllers\Admin\DashboardController;
 * use App\Http\Controllers\Admin\UserController;
 * use App\Http\Controllers\Admin\MessageController;
 * use Illuminate\Support\Facades\Route;
 * 
 * // Public routes
 * Route::get('/', function () {
 *     return view('beranda');
 * })->name('home');
 * 
 * // Auth routes
 * require __DIR__.'/auth.php';
 * 
 * // Authenticated user routes
 * Route::middleware('auth')->group(function () {
 *     // Profile routes
 *     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 *     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 *     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 * });
 * 
 * // Admin routes
 * Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
 *     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
 *     Route::resource('users', UserController::class);
 *     Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
 *     Route::post('/messages/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');
 * });
 */
