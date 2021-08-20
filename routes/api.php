<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentification\AuthController;
use App\Http\Controllers\Authentification\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersArticlesController;
use App\Http\Controllers\ArticleController;

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
Route::get('users-articles-count', [UsersArticlesController::class, 'UsersArticles']);
Route::post('article-store', [ArticleController::class, 'store'])->middleware('auth:api');
Route::get('articles', [ArticleController::class, 'index']);
