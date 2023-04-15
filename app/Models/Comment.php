<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'user_id',
      'body',
  ];

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
