<x-dropdown>
  <!-- dropdown trigger -->
  <x-slot name="trigger">
    <button 
      class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
    >
      {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
    <x-svg-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
    </button>
  </x-slot>

  <!-- dropdown links -->
    {{-- edit component to access named route --}}
  <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>

  @foreach ($categories as $category)
  <x-dropdown-item 
  {{-- merge category and search queries if user has used both search inputs --}}
    href="/?category={{$category->slug}}&{{http_build_query(request()->except('category'))}}" 
    :active='request()->is("categories/{$category->slug}")'>
    {{ucwords($category->name)}}</x-dropdown-item>
  @endforeach
</x-dropdown>