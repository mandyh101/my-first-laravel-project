@props(['trigger'])

<div x-data="{show: false}" @click.away = "show = false">

  <!-- trigger -->
  <div @click="show = ! show">
    {{$trigger}}
  </div>


  <!-- dropdown links -->

  <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-lg z-50 overflow-auto max-h-52" style="">
    {{$slot}}
  </div>
</div>