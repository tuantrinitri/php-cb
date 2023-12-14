<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Admin\PostController as PostController;
use App\Http\Controllers\Auth\AuthController as AuthController;
use App\Http\Controllers\Fontend;
use Illuminate\Support\Facades\Auth;
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

    Route::group(['prefix' => '/post'], function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/create', [PostController::class, 'store'])->name('admin.post.create');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::post('/edit/{id}', [PostController::class, 'update'])->name('admin.post.edit');
        Route::delete('/delete/{id}', [PostController::class, 'store'])->name('admin.post.edit');
    });


});

// Route area Client || Fontend
Route::group(['prefix' => '/'], function () {
    Route::get('/', [Fontend\FontendController::class, 'index'])->name('home'); // Titan
});


Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'postlogin'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
