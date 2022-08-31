<x-layout>
  <x-slot name='header'>
    <h1>My Laravel blog</h1>
  </x-slot>

  <article>
    <h1>{{$post->title}}</h1>
    <div>
      <p>{!!$post->body!!}</p>
    </div>
  </article>

    <a href="/">Go back</a>
  
</x-layout>



