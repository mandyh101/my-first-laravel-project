<?php

namespace App\Models;

class Post
{
  public static function find($slug)
  {
    if(!file_exists($path = resource_path("posts/{$slug}.html"))){
      return redirect('/');
    }

    //cache page data in memory for 5 seconds
    $post = cache()->remember("posts.{$slug}", 5 , function() use($path){
      var_dump('file_get_contents');
      return file_get_contents($path); 
    });
  }
}