<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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


Route::get("authors/{author:username}", function(User $author){
  return view('posts.index', [
    'posts'=> $author->posts
  ]);
});