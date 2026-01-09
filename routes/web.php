<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/packages', [PageController::class, 'packages'])->name('packages');
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', App\Http\Middleware\EnsureUserIsAdmin::class])->name('admin.dashboard');

Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->middleware(['auth'])->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
