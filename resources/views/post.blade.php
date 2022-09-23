<x-layout>
  <x-slot name='header'>
  <a class="main-a" href="/"><h1>My Laravel blog</h1></a>

  </x-slot>

  <article>
    <h1>{{$post->title}}</h1>
    <p>
    By <a href="/categories/{{$post->category->slug}}">{!!$post->author->name!!}</a> <a href="/categories/{{$post->category->slug}}">{!!$post->category->name!!}</a>
    </p>
    <div>
      <p>{!!$post->body!!}</p>
    </div>
  </article>

    <a href="/">Go back</a>
  
</x-layout>



