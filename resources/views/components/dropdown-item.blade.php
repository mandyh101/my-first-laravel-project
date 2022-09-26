

<!-- refactor tailwind classes into a variable to tidy up HTML component -->
@php
 $classes = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-gray-300 hover:text-white focus:text-white';
@endphp

<a {{ $attributes([ 'class' => $classes ])}}
>{{$slot}}</a>