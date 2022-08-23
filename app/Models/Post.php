<?php

namespace App\Models;

class Post
{
  public static function find($slug)
  {
    if(!file_exists($path = resource_path("posts/{$slug}.html"))){
      throw new ModelNotFoundException();
    }

    //cache page data in memory for 5 seconds
    return cache()->remember("posts.{$slug}", 5 , fn() => file_get_contents($path)); 
  }
}
