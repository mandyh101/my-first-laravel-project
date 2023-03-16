<x-layout>
  @include ('posts./_header')

  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    <!-- if posts have a count show the posts, else show a message -->
    @if ($posts->count())
    <x-post-grid :posts="$posts"/>>
    {{-- $posts are paginated so we can use the links method to show nd link to the paginated pages - NOTE this is auto styled with tailwind --}}
    {{$posts->links()}}
    @else
      <p class="text-center">Blog posts coming soon!</p>
    @endif
  </main>
</x-layout>
