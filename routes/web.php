<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;

// Route for the landing page handled by HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authenticated routes
Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('roles', RoleController::class)->except(['show']);
        Route::resource('permissions', PermissionController::class)->except(['show']);
        Route::resource('users', UserController::class);

        // Content routes
        Route::get('/content/edit', [ContentController::class, 'edit'])->name('content.edit');
        Route::post('/content/update', [ContentController::class, 'update'])->name('content.update');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin menu management routes
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('menus', MenuController::class);
});

require __DIR__ . '/auth.php';
