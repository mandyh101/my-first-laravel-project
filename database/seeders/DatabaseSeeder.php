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

        //create a default user to build with it's factory
        $user = User::factory()->create([
          'name'=> 'Mandy Hale'
        ]);

        //use the default user to override random data when you create database factories
        Post::factory(5)->create([
          'user_id' => $user->id
        ]);

        
    }
}
