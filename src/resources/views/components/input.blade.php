@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' border-gray-300 dark:border-gray-900 bg-white dark:text-black focus:border-[#E5E7FF] dark:focus:border-[#A0A8FF] focus:ring-[#E5E7FF] dark:focus:ring-[#A0A8FF] bg-white text-black rounded-md shadow-sm']) !!}>

