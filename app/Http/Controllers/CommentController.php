<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  /**
   * Stores a comment against a given post
   */
    public function store(Post $post, Request $request) 
    {
      // dd($request->all());
      //validate comment body
      $request->validate([
        'comment' => 'required|string'
      ]);

      //create new comment against the given post
      $post->comments()->create([
        'user_id' => auth()->user()->id,
        'body' => $request->comment
      ]);

      return back();
    }
}
