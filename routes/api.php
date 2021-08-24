<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentification\AuthController;
use App\Http\Controllers\Authentification\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersArticlesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OnlineController;
use App\Http\Controllers\ChatController;

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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('me', [AuthController::class, 'me']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('logout', [AuthController::class, 'logout']);


Route::get('category-count', [CategoryController::class, 'CategoryCount']);
Route::get('users-articles-count', [UsersArticlesController::class, 'UsersArticlesCount']);
Route::get('users-posts', [UsersArticlesController::class, 'UserPosts']);
Route::post('article-store', [ArticleController::class, 'store'])->middleware('auth:api');
Route::get('articles', [ArticleController::class, 'index']);
Route::post('search', [ArticleController::class, 'searchPost']);
Route::get('article/{id}', [ArticleController::class, 'show']);
Route::post('online', [OnlineController::class, 'isOnline']);
Route::delete('offline', [OnlineController::class, 'offline']);
Route::get('online-users', [OnlineController::class, 'onlineUsers']);
//
//Route::get('message', function () {
//    $message['user'] = 'User';
//    $message['message'] = 'Hello world2!';
//    $success = event(new \App\Events\ChatEvent($message));
//    return $success;
//});

Route::get('chat/rooms', [ChatController::class, 'rooms']);
Route::get('chat/room/{roomId}/messages', [ChatController::class, 'messages']);
Route::post('chat/room/{roomId}/message', [ChatController::class, 'newMessage']);
