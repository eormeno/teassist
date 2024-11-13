<x-crud-layout>
    <x-slot name="title">Modificar actividad</x-slot>

    <div class="min-h-screen bg-gray-900 py-6">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('activities.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-gray-200 hover:bg-gray-700 hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-gray-500 transition duration-150 ease-in-out group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-2 group-hover:-translate-x-0.5 transition-transform duration-150">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Volver
                </a>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-xl p-6">
                <form action="{{ route('activities.update', $activity) }}" method="POST"
                      enctype="multipart/form-data" class="space-y-6" novalidate>
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="name" value="Nombre"
                                class="text-gray-200 text-sm font-medium mb-2" />
                        <x-input id="name"
                                class="w-full rounded-lg bg-gray-700 border-gray-600 text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition duration-150 ease-in-out"
                                type="text"
                                name="name"
                                value="{{ $activity->name }}"
                                required
                                autofocus
                                autocomplete="name" />
                    </div>

                    <div>
                        <x-label for="description" value="Descripción"
                                class="text-gray-200 text-sm font-medium mb-2" />
                        <textarea id="description"
                                  name="description"
                                  rows="4"
                                  class="w-full rounded-lg bg-gray-700 border-gray-600 text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm transition duration-150 ease-in-out"
                                  required>{{ $activity->description }}</textarea>
                    </div>

                    <div>
                        <x-label value="Imagen actual"
                                class="text-gray-200 text-sm font-medium mb-2" />
                        <div class="mt-2 relative group">
                            <img src="data:image/png;base64,{{ $activity->image }}"
                                 alt="Imagen actual de {{ $activity->name }}"
                                 class="rounded-lg w-48 h-48 object-cover border-2 border-gray-600 group-hover:border-gray-500 transition-colors duration-150">
                            <div class="absolute inset-0 bg-gray-900/50 opacity-0 group-hover:opacity-100 rounded-lg transition-opacity duration-150 flex items-center justify-center">
                                <span class="text-white text-sm">Imagen actual</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <x-label for="image" value="Nueva imagen"
                                class="text-gray-200 text-sm font-medium mb-2" />
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-600 px-6 py-10 hover:border-gray-500 transition-colors duration-150">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-400">
                                    <label for="image"
                                        class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-300">
                                        <span>Seleccionar archivo</span>
                                        <x-input id="image"
                                                name="image"
                                                type="file"
                                                class="sr-only"
                                                required />
                                    </label>
                                    <p class="pl-1">o arrastrar y soltar</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-400">PNG, JPG, GIF hasta 10MB</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-4 border-t border-gray-700">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-indigo-500 transition duration-150 ease-in-out shadow-lg shadow-indigo-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-crud-layout>
