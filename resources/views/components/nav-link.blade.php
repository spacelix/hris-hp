@props(['active'])

@php
    $classes = $active ?? false ? 'flex items-center p-2 text-base font-normal text-white rounded-lg dark:text-white hover:bg-blue-800  dark:hover:bg-blue-900 bg-blue-700 hover:text-gray-50 transition duration-75' : 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-75';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
