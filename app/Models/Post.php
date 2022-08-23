<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
  public static function all()
  {
    $files = File::files(resource_path("posts/"));

    return array_map(function($file){ //map over the array and return each item to the callbaack function
      return $file->getContents();
    }, $files);
  }

  public static function find($slug)
  {
    if(!file_exists($path = resource_path("posts/{$slug}.html"))){
      throw new ModelNotFoundException();
    }

    //cache page data in memory for 5 seconds
    return cache()->remember("posts.{$slug}", 5 , fn() => file_get_contents($path)); 
  }
}
