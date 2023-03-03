<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('get.dashboard');

    Route::prefix('providers')->group(function () {
        Route::get('/', [ProviderController::class, 'index'])->name('get.providers');
        Route::get('create', [ProviderController::class, 'create'])->name('get.providers.create');
        Route::post('store', [ProviderController::class, 'store'])->name('post.providers.store');
        Route::get('edit/{id}', [ProviderController::class, 'edit'])->name('get.providers.edit');
        Route::post('update/{id}', [ProviderController::class, 'update'])->name('post.providers.update');
        Route::post('delete/{id}', [ProviderController::class, 'delete'])->name('post.providers.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('get.categories');
        Route::get('create', [CategoryController::class, 'create'])->name('get.categories.create');
        Route::post('store', [CategoryController::class, 'store'])->name('post.categories.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('get.categories.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('post.categories.update');
        Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('post.categories.delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('get.products');
        Route::get('create', [ProductController::class, 'create'])->name('get.products.create');
        Route::post('store', [ProductController::class, 'store'])->name('post.products.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('get.products.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('post.products.update');
        Route::post('delete/{id}', [ProductController::class, 'delete'])->name('post.products.delete');
    });
});
