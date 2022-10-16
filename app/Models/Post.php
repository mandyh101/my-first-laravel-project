<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
  
    //Eager load category and author data with a post:
    protected $with = ['category', 'author'];
      //be careful using with here - it now means every time you query a post, youll see the related user and category data too. If you didn't need to load these relationships everytime you viewed a post this could result in unnessecary data usage
    
      /**
       * Query scope for easy query building to filter posts
       */
      public function scopeFilter($query, array $filters) //Post::newQuery()->filter
        {
          //if user enters a search term, filter posts array for only posts with a title containing a matching word to the %search% term 
          if ($filters['search'] ?? false) {
            $query
              ->where('title', 'like', '%' . request('search') . '%') 
              ->orWhere('body', 'like', '%' . request('search') . '%'); 
          }
        }

    
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
