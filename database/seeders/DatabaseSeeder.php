<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use \App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //delete existing user and category seeds if you run seeds without refreshing migrations
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();
        
        $personal = Category::create([
          'name' => 'Personal',
          'slug' => 'personal'
        ]);
        
        $work = Category::create([
          'name' => 'Work',
          'slug' => 'work'
        ]);

        $study = Category::create([
          'name' => 'Study',
          'slug' => 'study'
        ]);

        Post::create([
          'user_id' => $user->id,
          'category_id' => $study->id,
          'title' => 'My study post',
          'slug' => 'my-study-post',
          'excerpt' => '<p></p>my-study-postmy-study-postmy-study-postmy-study-post</p>',
          'body' => '<p>my-study-postmy-study-postmy-study-postmy-study-postmy-study-postmy-study-postmy-study-postvvvvmy-study-postmy-study-postmy-study-postmy-study-postvvvvmy-study-postmy-study-postvmy-study-postmy-study-postvmy-study-postmy-study-post</p>',
  
        ]);
        Post::create([
          'user_id' => $user->id,
          'category_id' => $work->id,
          'title' => 'My work post',
          'slug' => 'my-work-post',
          'excerpt' => '<p>my-work-postmy-work-postmy-work-postmy-work-post</p>',
          'body' => '<p>my-work-postmy-work-postmy-work-postmy-work-postmy-work-postmy-work-postmy-work-postvvvvmy-work-postmy-work-postmy-work-postmy-work-postvvvvmy-work-postmy-work-postvmy-work-postmy-work-postvmy-work-postmy-work-post</p>',
  
        ]);

        Post::create([
          'user_id' => $user->id,
          'category_id' => $personal->id,
          'title' => 'My personal post',
          'slug' => 'my-personal-post',
          'excerpt' => '<p>my-personal-postmy-personal-postmy-personal-postmy-personal-post</p>',
          'body' => '<p>my-personal-postmy-personal-postmy-personal-postmy-personal-postmy-personal-postmy-personal-postmy-personal-postvvvvmy-personal-postmy-personal-postmy-personal-postmy-personal-postvvvvmy-personal-postmy-personal-postvmy-personal-postmy-personal-postvmy-personal-postmy-personal-post</p>',
  
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
