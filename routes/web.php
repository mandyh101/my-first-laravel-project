<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

// home page route
Route::get('/', [PostController::class, 'index' ])->name('home');

//single post route
Route::get("posts/{post}", [PostController::class, 'show' ]);

//middleware inspects a request, and can perform logic or redirect the logged in person depending on its logic
//add guest middleware to register routes so only user are not logged in can see them
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy']);