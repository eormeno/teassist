<x-crud-layout>
    <x-slot name="title">Modificar actividad</x-slot>

    <x-button onclick="location.href='{{ route('activities.index') }}'" class="inline-flex items-center px-4 py-2 mb-2 font-semibold text-xs disabled:opacity-25 transition ease-in-out duration-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </x-button>

    <form action="{{ route('activities.update', $activity) }}" method="POST" class="mt-2"
        enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="mt-2">
            <x-label for="name" value="Nombre" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                value="{{ $activity->name }}" required autofocus autocomplete="name" />
        </div>
        <div class="mt-2">
            <x-label for="description" value="Descripción" />
            <textarea name="description" id="description" cols="30" rows="3"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-200 dark:text-gray-900 focus:border-[#E5E7FF] dark:focus:border-[#A0A8FF] focus:ring-[#E5E7FF] dark:focus:ring-[#A0A8FF] rounded-md shadow-sm block mt-1 w-full"
                required>{{ $activity->description }}</textarea>
        </div>
        <div class="mt-2">
            <x-label for="image" value="Imagen" />
            <img src="data:image/png;base64,{{ $activity->image }}" alt="Imagen de la actividad" width="255" class="mt-2 rounded-md">
        </div>
        <div class="mt-3">
            <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required
                autocomplete="image" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Modificar actividad') }}
            </x-button>
        </div>
    </form>

</x-crud-layout>
