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

//individual blog post route
//line 23 - curly braces = wildcard
Route::get("posts/{post}", function($id) { 
  $post = Post::findOrFail($id);
  return view('post', ['post' => $post]); //return view called post, pass the post to the view
});