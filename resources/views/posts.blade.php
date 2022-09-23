<x-layout>

  <x-slot name='header'>
    <h1>My Laravel blog</h1>
  </x-slot>
  @foreach($posts as $post)
    <article>
      <h2>
        <a href="/posts/{{$post->slug}}">
        {{$post->title}}
        </a>
      </h2>
      <p>
        By <a href="/authors/{{$post->author->username}}">{!!$post->author->username!!}</a> 
      </p>
      <!-- code below used the eloquent relationship in the Post model to join the post and data table and show the posts matching category name -->
      <p>
        Category:<a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
      </p> 
      <p class="{{$loop->even?'diff-bground':''}}">
        <em>Published on <?= date('m/d/Y', $post->date) ; ?></em>
      </p>
      <div>
      {{$post->excerpt}}
      </div>
    </article>
  @endforeach

</x-layout>
