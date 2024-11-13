<x-crud-layout>
    <x-slot name="title">Detalle de la actividad</x-slot>
    <x-button onclick="location.href='{{ route('activities.index') }}'" class="inline-flex items-center px-4 py-2 mb-2 font-semibold text-xs disabled:opacity-25 transition ease-in-out duration-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </x-button>

    <p>Nombre: {{ $activity->name }}</p>
    <p>Descripción: {{ $activity->description }}</p>
    <img src="data:image/png;base64,{{ $activity->image }}" alt="Imagen de la actividad" width="255">

</x-crud-layout>
