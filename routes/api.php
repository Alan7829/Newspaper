<?php

use App\Http\Controllers\API\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('article/{article_id}/comments', [CommentController::class, 'getArticleComments']);
Route::patch('comments/{comment_id}/ban', [CommentController::class, 'banComment']);
Route::patch('comments/{comment_id}/unban', [CommentController::class, 'unbanComment']);
