<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Admin\NewController as NewController;
use App\Http\Controllers\Fontend;
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


// Route area Admin

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index'); // dashboard



    /**
     *
     * Route for category
     */
    Route::group(['prefix' => '/category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.edit');
        Route::delete('/delete/{id}', [CategoryController::class, 'store'])->name('admin.new.edit');
    });

    /**
     *
     * Route for new
     */

    Route::group(['prefix' => '/new'], function () {
        Route::get('/', [NewController::class, 'index'])->name('admin.new.index');
        Route::get('/create', [NewController::class, 'create'])->name('admin.new.create');
        Route::post('/create', [NewController::class, 'store'])->name('admin.new.create');
        Route::get('/edit/{id}', [NewController::class, 'edit'])->name('admin.new.edit');
        Route::post('/edit/{id}', [NewController::class, 'update'])->name('admin.new.edit');
        Route::delete('/delete/{id}', [NewController::class, 'store'])->name('admin.new.edit');
    });


});

// Route area Client || Fontend
Route::group(['prefix' => '/'], function () {
    Route::get('/', [Fontend\FontendController::class, 'index'])->name('home'); // Titan
});
