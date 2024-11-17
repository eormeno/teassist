<x-crud-layout>
    <x-slot name="title">Detalle de la actividad</x-slot>

    <!-- Botón de regreso -->
    <x-button onclick="location.href='{{ route('activities.index') }}'" class="inline-flex items-center px-4 py-2 mb-2 font-semibold text-xs disabled:opacity-25 transition ease-in-out duration-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </x-button>

    <!-- Contenedor principal -->
    <div class="grid grid-cols-2 gap-4 p-6 bg-white rounded-lg shadow-md border border-gray-200">

        <!-- Información principal -->
        <div>
            <h3 class="text-lg font-semibold text-[#A0A8FF] mb-2">Detalles de la Actividad</h3>
            <p><strong>Nombre:</strong> {{ $activity->name }}</p>
            <p><strong>Descripción:</strong> {{ $activity->description }}</p>
        </div>

        <!-- Imagen -->
        <div class="flex justify-center items-center">
            <img src="data:image/png;base64,{{ $activity->image }}" alt="Imagen de la actividad" class="max-w-full h-auto rounded-lg border border-gray-300">
        </div>
    </div>
</x-crud-layout>
