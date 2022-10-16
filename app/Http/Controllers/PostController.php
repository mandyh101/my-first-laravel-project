<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
          'posts' => Post::latest()->filter(request(['search']))->get(), //filter by the search term from the request as an array - passes to the query scope
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
