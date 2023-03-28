<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    //a comment  belongs to a post
    public function post()
    {
      return $this->belongsTo(Post::class);
    }

    //A comment belongs to an author (user model)
    public function author()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
