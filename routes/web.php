<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home page route
Route::get('/', function () {
  $files = File::files(resource_path("posts"));
  $posts =[];

  foreach($files as $file){
    $document = YamlFrontMatter::parseFile($file);
    $posts[] = new Post(
      $document->title,
      $document->excerpt,
      $document->date,
      $document->body(),
    );
  }
  
  ddd($posts);

  // $document = YamlFrontMatter::ParseFile(
  //   resource_path('posts/my-first-post.html'));

  
  // return view('posts', [
  //   'posts' => Post::all()
  //   ]);
});

//individual blog post route
//line 23 - curly braces = wildcard
//line 24 - the second argument is converting post into a variable that gets file contents.
Route::get("posts/{post}", function($slug) { 
  //find  post by its own slug and pass it to a view called "post"
  $post = Post::find($slug);
  return view('post', ['post' => $post]); //return view called post, pass the post to the view
})->where('post', '[A-z_\-]+'); //this tells the route that our {post} wildcard, must contain only 1 or more (+) letters that are lowercase or uppercase ([A-z]) or underscores, or dashes. 