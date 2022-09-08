<?php

use App\Models\Post;
use App\Models\Category;
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

// write route function to listen to queries and log sql of query so we can check for n+1 issue
Route::get('/', function(){
  \Illuminate\Support\Facades\DB::listen(function($query){
    logger($query->sql);
  });
  return view('posts', [
    'posts' => Post::all()
    ]);
});

// home page route
Route::get('/', function () {
  return view('posts', [
    'posts' => Post::all()
    ]);
});


Route::get("posts/{post}", function(Post $post) { 
  return view('post', ['post' => $post]); 
});

Route::get("categories/{category:slug}", function(Category $category){
  return view('posts', [
    'posts'=> $category->posts 
  ]);
});