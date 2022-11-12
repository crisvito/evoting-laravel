@props(['active'])

@php
    $classes = $active ?? false ? 'font-bold' : 'class="flex items-center text-gray-700 text-base hover:blur-xs hover:text-gray-900 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
