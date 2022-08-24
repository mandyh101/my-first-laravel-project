<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Laracast blog</title>
  <link rel="stylesheet" href="/app.css">
</head>
<body>
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

</body>
</html>