@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-black  bg-white text-black focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
