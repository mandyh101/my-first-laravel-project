@extends('layout')

@section('content')
  @foreach($posts as $post)
    <article>
      <h1>
        <a href="/posts/{{$post->slug}}">
        {{$post->title}}
        </a>
      </h1>
      <p class="{{$loop->even?'diff-bground':''}}">
        <em>Published on <?= date('m/d/Y', $post->date) ; ?></em>
      </p>
      <div>
      {{$post->excerpt}}
      </div>
    </article>
  @endforeach
@endsection('content')
