<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;


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

Route::group([

    'middleware' => 'api',

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::resource('games', GameController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('comments', \App\Http\Controllers\CommentController::class);
    Route::resource('companies', \App\Http\Controllers\CompanyController::class);
    Route::resource('news', \App\Http\Controllers\NewsController::class);
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
    Route::post('register',[AuthController::class,'register']);



    Route::post('news-comments',[NewsController::class,'createNewsComment']);
    Route::post('game-comments',[GameController::class,'createGameComment']);
    Route::post('news-reactions',[AuthController::class,'createNewsReactions']);
    Route::post('register',[AuthController::class,'register']);
    Route::post('register',[AuthController::class,'register']);

});
