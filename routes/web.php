<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Fontend\FontendController ;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Posts;
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
        Route::get('/', [PostsController::class, 'index'])->name('admin.new.index');
        Route::get('/create', [PostsController::class, 'create'])->name('admin.new.create');
        Route::post('/create', [PostsController::class, 'store'])->name('admin.new.create');
        Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('admin.new.edit');
        Route::post('/edit/{id}', [PostsController::class, 'update'])->name('admin.new.edit');
        Route::delete('/delete/{id}', [PostsController::class, 'store'])->name('admin.new.edit');
    });


});

// Route area Client || Fontend
Route::group(['prefix'=>"/"],function(){
    Route::get('/',[FontendController::class,'index'])->name('home'); //titan
});
Route::group(['prefix'=>'/table'],function(){
    Route::get('/',[TableController::class,'index'])->name('admin.tab.index');
});
Route::get('/login',[AuthController::class,'login'])->name('auth.login'); 
Route::post('/login',[AuthController::class,'postLogin'])->name('auth.login'); 
Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout'); 