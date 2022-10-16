<?php

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
Route::get('/', function () {


  $posts = Post::latest();

  //if user enters a search term, posts will be an array of only posts with a title containing a matching word to the search term 

  if (request('search')) {
    $posts
      ->where('title', 'like', '%' . request('search') . '%') 
      ->orWhere('body', 'like', '%' . request('search') . '%'); 
  }

    return view('posts', [
      'posts' => $posts->get(),
      'categories' => Category::all()
      ]);
  })->name('home');


Route::get("posts/{post}", function(Post $post) { 
  return view('post', ['post' => $post]); 
});

Route::get("categories/{category:slug}", function(Category $category){
  return view('posts', [
    //use laod() to prevent lazy loading and n+1 issue 
    'posts'=> $category->posts ,
    'currentCategory' => $category,
    'categories' => Category::all()
  ]);
})->name('category');

Route::get("authors/{author:username}", function(User $author){
  return view('posts', [
    'posts'=> $author->posts
  ]);
});