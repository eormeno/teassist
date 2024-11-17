@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm dark:text-gray-300 text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
