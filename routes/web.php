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

/* Rutas del sitio publico */
Route::get('/', [App\Http\Controllers\Site\PageController::class, 'home'])->name('site.index');

/* Rutas para iniciar sesion, registro, etc, sin proteccion con prefijo /admin/ */
Route::prefix('admin')->group(function () {
    Auth::routes();
});

/* Rutas protegidas con login con prefijo /admin/ */
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/comments', App\Http\Controllers\Admin\CommentController::class);
    Route::resource('/news', App\Http\Controllers\Admin\NewsController::class);
});
