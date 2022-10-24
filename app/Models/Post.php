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
          //use when method to check when a search filter exists, and trigger function if the check is true
          $query->when($filters['search'] ?? false, fn($query, $search) => 
          $query
          ->where('title', 'like', '%' . $search . '%') 
          ->orWhere('body', 'like', '%' . $search. '%'));


        //* OPTION one for adding categories to the search filter
        //   $query->when($filters['category'] ?? false, fn($query, $category ) => 
        //   $query
        //   ->whereExists(fn($query) => 
        //   $query->from('categories')
        //   ->whereColumn('categories.id', 'posts.category_id') //Where accepts a vlaue as the second param and so posts.category_id is read a s a string unless you use whereColumn
        //   ->where('categories.slug', $category)
        // ));
        

        //* OPTION two for adding categories to the search filter
          $query->when($filters['category'] ?? false, fn($query, $category ) => 
          $query
          ->whereHas('category', fn($query) => 
          $query->where('slug', $category)
        ));

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
