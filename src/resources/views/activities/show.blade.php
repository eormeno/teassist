<x-crud-layout>
    <x-slot name="title">Detalle de la actividad</x-slot>
    <a href="{{ route('activities.index') }}">
        <div
            class="inline-flex items-center px-4 py-2 mb-2 bg-azullogo border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </div>
    </a>

    <div class="p-6 max-w-full mx-auto bg-white rounded-lg border border-gray-200 shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detalles de la Actividad</h2>

        <div class="mb-4">
            <p class="text-gray-700 font-semibold">Nombre:</p>
            <p class="text-gray-600">{{ $activity->name }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700 font-semibold">Descripción:</p>
            <p class="text-gray-600">{{ $activity->description }}</p>
        </div>

        <div class="mt-4">
            <img src="data:image/png;base64,{{ $activity->image }}"
                 alt="Imagen de la actividad"
                 class="w-2/4 h-auto mx-auto rounded-md shadow-sm border border-gray-300">
        </div>
    </div>

</x-crud-layout>
