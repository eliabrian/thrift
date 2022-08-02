<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/login', 'authenticate')->name('auth.authenticate');
    Route::post('/logout', 'logout')->name('auth.logout');
});

Route::middleware(['auth'])->group(function() {
    
    Route::prefix('admin')->group(function() {
        // Dashboard Routes
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Product Routes
        Route::controller(ProductController::class)->group(function () {
            Route::get('/products', 'index')->name('admin.product.index');
            Route::get('/products/create', 'create')->name('admin.product.create');
            Route::get('/products/{product}/edit', 'edit')->name('admin.product.edit');
            Route::post('/products', 'store')->name('admin.product.store');
            Route::put('/products/{product}', 'update')->name('admin.product.update');
            Route::delete('/products/{product}', 'destroy')->name('admin.product.destroy');
        });
        
    });
});
