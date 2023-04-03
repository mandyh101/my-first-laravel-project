{{-- This component accepts classes passed through as attributes, that will be added to the default classes that already exist --}}
<div {{$attributes(['class' => "border border-gray-200 p-6 rounded-xl"])}}>
  {{$slot}}
</div>