<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
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
    }

    public function show(Post $post)
    {
      return view('post', [
        'post' => $post
      ]); 
    }
}
