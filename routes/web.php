<?php

use App\Http\Controllers\test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class,"homepage"]);
Route::get('/', [UserController::class,"feed"]);
Route::post('/register',[UserController::class,"register"]);
Route::post('/login',[UserController::class,"login"]);
Route::post('/logout',[UserController::class,"logout"]);
