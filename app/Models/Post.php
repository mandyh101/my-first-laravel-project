<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
  //be carefull using with here - it now means every time you query a post, youll see the related user and category data too. If you didn't need to load these relationships everytime you viewed a post this could result in unnessecary data usage
    protected $with = ['category', 'author'];

    
    public function getRouteKeyName()
    {
      return 'slug';
    }

    //code below builds an eloquent relationship between the post and the category that match in each table
    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    //Eloquent relationship: a post belongs to a user
    //have named the foreign key as the second argument as changed the name of the relationship from user to author
    public function author()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
