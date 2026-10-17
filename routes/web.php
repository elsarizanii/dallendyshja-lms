<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SyncLogController;
use App\Http\Controllers\Auth\Register;
    Route::get('/', function () { 
        return view('welcome'); 
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        
        Route::middleware('guest')->group(function () {
            Route::view('/register', 'auth.register')->name('register');
            Route::post('/register', [Register::class, 'register'])->name('register.store');
        });

        //scrum-212
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
        Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/admin/sync-logs', [SyncLogController::class, 'index'])->name('admin.sync-logs');
    });

require __DIR__.'/auth.php';
