<x-layout>
  @include ('_posts-header')

  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    <!-- if posts have a count show the posts, else show a message -->
    @if ($posts->count())
      <x-post-grid :posts="$posts"/>>
    @else
      <p class="text-center">Blog posts coming soon!</p>
    @endif
  </main>
</x-layout>
