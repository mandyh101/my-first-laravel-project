<x-layout>
  @include ('_posts-header')

  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    <!-- if posts have a count show the posts, else show a message -->
    @if ($posts->count())
      <x-post-featured-card :post="$posts->first()"/>

      @if ($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-2">
          @foreach ($posts->skip(1) as $post)
            <x-post-card :post="$post" class="bg-red-500"/>
          @endforeach
        </div>
      @endif

    @else
      <p class="text-center">Blog posts coming soon!</p>
    @endif
  </main>
</x-layout>
