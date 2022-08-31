<?php

use App\Models\Post;
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
Route::get('/', function () {
  return view('posts', [
    'posts' => Post::all()
    ]);
});

//route model binding = if wildcard param matches the variable passed to the function, the program will find the default key that matches the wildcard variable and use it to find the content for the route.
//give me the post where the value passed to the route matches the slug of a post
Route::get("posts/{post}", function(Post $post) { 
  //$post = Post::findOrFail($post);
  return view('post', ['post' => $post]); //return view called post, pass the post to the view
});