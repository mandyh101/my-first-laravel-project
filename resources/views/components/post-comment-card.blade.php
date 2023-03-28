@props(['comment'])

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
  <div>
    <img src="https://i.pravatar.cc/60?u={{$comment->id}}" width="60" height="60" class="rounded-xl" alt="avatar">
  </div>
  <div>
    <header class="mb-4">
      <h3>
        <strong>{{$comment->author->username}}</strong>
      </h3>
      <p class="text-xs">Posted <time>{{$comment->created_at}}</time></p>
    </header>
    <p>{{$comment->body}}</p>
  </div>

</article>