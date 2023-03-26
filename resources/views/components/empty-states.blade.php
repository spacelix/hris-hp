<a {{ $attributes->merge() }}
    class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none"
        viewBox="0 0 48 48" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
    </svg>
    <span class="mt-2 block text-sm font-medium text-gray-900 dark:text-white">{{ $slot }}</span>
</a>

{{-- @props(['active'])

@php
    $classes = $active ?? false ? 'flex items-center p-2 text-base font-normal text-white rounded-lg dark:text-white hover:bg-blue-800  dark:hover:bg-blue-900 bg-blue-700 hover:text-gray-50 transition duration-75' : 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-75';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a> --}}
