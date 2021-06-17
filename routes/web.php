<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('AdminPanel');

    Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class,);

    // Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('CategoriesIndex');
    // Route::get('/categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('CategoriesCreate');
    // Route::get('/categories/show', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('CategoriesShow');

    Route::get('/comments', [App\Http\Controllers\Admin\CommentController::class, 'index'])->name('CommentsIndex');
    Route::get('/comments/create', [App\Http\Controllers\Admin\CommentController::class, 'create'])->name('CommentsCreate');
});
