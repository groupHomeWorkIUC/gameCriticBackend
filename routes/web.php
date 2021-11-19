<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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

Route::resource('game', GameController::class);
Route::resource('user', UserController::class);
Route::resource('category', CategoryController::class);
Route::resource('comment', CommentController::class);
Route::resource('company', CompanyController::class);
Route::resource('new', Controller::class);


