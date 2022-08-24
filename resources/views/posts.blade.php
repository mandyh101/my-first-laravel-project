@extends('layout')

@section('banner')
  <h1>My first Laravel blog</h1>
@endsection('banner')

@section('content')
  @foreach($posts as $post)
    <article>
      <h2>
        <a href="/posts/{{$post->slug}}">
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
@endsection('content')
