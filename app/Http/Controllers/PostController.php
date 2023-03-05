<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
          //use query value in the request to filter the posts shown
          'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->get(), //filter by the search term from the request as an array - passes to the query scope
          ]);
    }

    public function show(Post $post)
    {
      return view('posts.show', [
        'post' => $post
      ]); 
    }

}
