<?php

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
    return view('posts');
});

//individual blog post route
//line 23 - curly braces = wildcard
//line 24 - the second argument is converting post into a variable that gets file contents.
Route::get("posts/{post}", function($slug) { 

  if(!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")){
    return redirect('/');
  }

  //cache page data in memory for 5 seconds
  $post = cache()->remember("posts.{$slug}", 5 , function() use($path){
    var_dump('file_get_contents');
    return file_get_contents($path); 
  });

  return view('post', ['post' => $post]);
})->where('post', '[A-z_\-]+'); //this tells the route that our {post} wildcard, must contain only 1 or more (+) letters that are lowercase or uppercase ([A-z]) or underscores, or dashes. 