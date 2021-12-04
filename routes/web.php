<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;


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

    Route::get('/', [DashboardController::class, 'createGamePage']);
    Route::view('/news-create', 'news');
    Route::post('/game-create', [GameController::class, 'createGame']);
    Route::get('/news', [DashboardController::class, 'createNewsPage']);
    Route::post('/news-create', [NewsController::class, 'createNews']);
    Route::get('/login', [DashboardController::class, 'loginPage'])->name('login-get');
    Route::post('/login-page', [DashboardController::class, 'login'])->name('login-post');
