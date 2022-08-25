<x-layout>

  <x-slot name='header'>
    <h1>My Laravel blog</h1>
  </x-slot>
  @foreach($posts as $post)
    <article>
      <h2>
        <a href="/posts/{{$post->id}}">
        {{$post->title}}
        </a>
      </h2>
      <p class="{{$loop->even?'diff-bground':''}}">
        <em>Published on <?= date('m/d/Y', $post->date) ; ?></em>
      </p>
      <div>
      {{$post->excerpt}}
      </div>
    </article>
  @endforeach

</x-layout>
