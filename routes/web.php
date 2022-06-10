<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManageNewsController;
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

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('backoffice.index');

    Route::middleware('checkPermissions')->group(function(){
        Route::group(['prefix' => 'users', 'as'=>'users.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/{id}', [UserController::class, 'show'])->name('show');
            Route::post('update/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'roles', 'as'=>'roles.'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/{id}', [RoleController::class, 'show'])->name('show');
            Route::post('update/{id}', [RoleController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [RoleController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'news', 'as' => 'news.'], function(){
            Route::get('/',[ArticleController::class, 'index'])->name('index');
            Route::get('/create', [ArticleController::class, 'create'])->name('create');
            Route::post('/store', [ArticleController::class, 'store'])->name('store');
            Route::get('/{id}', [ArticleController::class, 'show'])->name('show');
            Route::post('update/{id}', [ArticleController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [ArticleController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){
            Route::get('/',[CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'manage-news', 'as' => 'manage.news.'], function(){
            Route::get('/',[ManageNewsController::class, 'index'])->name('index');
        });
    });
});

