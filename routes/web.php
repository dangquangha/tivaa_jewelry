<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProviderController;

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
});
