@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400  text-sm font-medium leading-5 text-black  focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-sm font-medium leading-5 text-black  hover:text-blue-700  hover:border-blue-300  focus:outline-none focus:text-blue-700  focus:border-gray-300 dark:focus:border-blue-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
