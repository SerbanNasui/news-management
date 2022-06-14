<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManageNewsController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\CommentController;
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
    Route::get('/ajax-data-loader', [DashboardController::class, 'ajaxDashboardLoader'])->name('backoffice.ajaxDashboardLoader');

    Route::middleware('checkPermissions')->group(function(){
        Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs.index');
        Route::group(['prefix' => 'users', 'as'=>'users.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/{id}', [UserController::class, 'show'])->name('show');
            Route::post('update/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'profile', 'as'=>'profile.'], function () {
            Route::get('/{id}', [UserProfileController::class, 'index'])->name('index');
            Route::post('/create/{id}', [UserProfileController::class, 'create'])->name('create');
            Route::post('/update/{id}', [UserProfileController::class, 'update'])->name('update');
            Route::post('/change-password{id}', [UserProfileController::class, 'changePassword'])->name('change.password');
        });

        Route::group(['prefix' => 'roles', 'as'=>'roles.'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/{id}', [RoleController::class, 'show'])->name('show');
            Route::post('update/{id}', [RoleController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [RoleController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){
            Route::get('/',[CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'news', 'as' => 'news.'], function(){
            Route::get('/',[ArticleController::class, 'index'])->name('index');
            Route::get('/create', [ArticleController::class, 'create'])->name('create');
            Route::post('/store', [ArticleController::class, 'store'])->name('store');
            Route::get('/{id}', [ArticleController::class, 'show'])->name('show');
            Route::post('update/{id}', [ArticleController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [ArticleController::class, 'destroy'])->name('destroy');

            Route::get('view/{id}', [ArticleController::class, 'view'])->name('view');
        });

        Route::group(['prefix' => 'manage-news', 'as' => 'manage.news.'], function(){
            Route::get('/',[ManageNewsController::class, 'index'])->name('index');
            Route::get('/publish', [ManageNewsController::class, 'publishArticle'])->name('publish');
            Route::post('/filter-by-writer', [ManageNewsController::class, 'filterByWriter'])->name('filter-by-writer');
            Route::get('/highlights', [ManageNewsController::class, 'highlights'])->name('highlights');
            Route::get('/highlight-article', [ManageNewsController::class, 'highlightArticle'])->name('highlight.article');
            Route::get('/preview-article', [ManageNewsController::class, 'previewArticle'])->name('preview.article');

            Route::get('/comments', [ManageNewsController::class, 'commentsIndex'])->name('comments.index');
            Route::get('/comments-approve', [ManageNewsController::class, 'commentApprove'])->name('comments.approve');
        });

        Route::group(['prefix' => 'weather', 'as' => 'weather.'], function(){
            Route::get('/',[WeatherController::class, 'index'])->name('index');
            Route::post('/store', [WeatherController::class, 'store'])->name('store');
            Route::delete('delete/{id}', [WeatherController::class, 'delete'])->name('delete');
            Route::put('restore/{id}', [WeatherController::class, 'restore'])->name('restore');
            Route::delete('destroy/{id}', [WeatherController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::get('/news/{id}', [HomeController::class, 'showArticlesFromCategory'])->name('show.articles.from.category');
Route::get('/article/{id}/show', [HomeController::class, 'displayArticle'])->name('display.article');
Route::get('/views/{id}', [ViewsController::class, 'incrementViews'])->name('increment.views');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
