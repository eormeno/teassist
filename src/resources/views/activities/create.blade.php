<x-crud-layout>
    <x-slot name="title">Nueva Actividad</x-slot>

    <a href="{{ route('activities.index') }}">
        <div
            class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </div>
    </a>
    <x-validation-errors class="mb-4" />
    <form action="{{ route('activities.store') }}" method="POST" class="mt-2" novalidate
        enctype="multipart/form-data">
        @csrf
        <div class="mt-2">
            <x-label for="name" value="Nombre" class="font-semibold label-custom-blue"/>
            <x-input id="name" class="block mt-1 w-full input-bg-white" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>
        <div class="mt-2">
            <x-label for="description" value="Descripción" class="font-semibold label-custom-blue" />
            <textarea name="description" id="description" cols="30" rows="5"
                class="block mt-1 w-full input-bg-white"
                required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <x-label for="image" value="Imagen" class="font-semibold label-custom-blue"/>
            <x-input id="image" class="block mt-1 w-full input-bg-white" type="file" name="image" :value="old('image')" required
                autocomplete="image" />
            <x-input-error for="image" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button class="btn-primary">Crear actividad</x-button>
        </div>
    </form>

</x-crud-layout>
