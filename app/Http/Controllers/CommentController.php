<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  /**
   * Stores a comment against a given post
   */
    public function store(Post $post) 
    {
      dd('here', $post);
    }
}
