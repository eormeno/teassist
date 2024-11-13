@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-2 border-[#0075b2] dark:border-[#0075b2] dark:bg-gray-900 dark:text-gray-300
                focus:border-[#005c8c] dark:focus:border-[#005c8c]
                focus:ring-[#005c8c] rounded-md shadow-sm'
]) !!}>
