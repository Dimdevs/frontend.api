<?php
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CollegerController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    // cheking route
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('login.store');

    Route::middleware(['auth' , 'check.admin'])->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('super-admins')->controller(SuperAdminController::class)->group(function(){
            Route::get('/', 'index')->name('super-admins.index');
            Route::get('/create', 'create')->name('super-admins.create');
            Route::post('/create/store', 'store')->name('super-admins.store');
            Route::get('/edit/{id}', 'edit')->name('super-admins.edit');
            Route::put('/edit/update/{id}', 'update')->name('super-admins.update');
            Route::get('/show/{id}', 'show')->name('super-admins.show');
            Route::delete('/destroy/{id}', 'destroy')->name('super-admins.destroy');
        });

        Route::prefix('collegers')->controller(CollegerController::class)->group(function(){
            Route::get('/', 'index')->name('collegers.index');
            Route::get('/create', 'create')->name('collegers.create');
            Route::post('/create/store', 'store')->name('collegers.store');
            Route::get('/edit/{id}', 'edit')->name('collegers.edit');
            Route::put('/edit/update/{id}', 'update')->name('collegers.update');
            Route::get('/show/{id}', 'show')->name('collegers.show');
            Route::delete('/destroy/{id}', 'destroy')->name('collegers.destroy');
        });

    });
});
