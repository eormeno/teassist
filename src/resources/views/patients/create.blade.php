<!-- resources/views/patients/create.blade.php -->
<x-crud-layout>
    <x-slot name="title">Nuevo Paciente</x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-gray-300 border-b border-indigo-300">
                    <div>
                        <a href="{{ route('patients.index') }}">
                            <div class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div >
                        <x-validation-errors class="mb-4" />                                           
                    </div>
                    <form action="{{ route('patients.store') }}" method="POST" class="mt-2" novalidate>
                        @csrf
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="codigo" value="Código" />
                            <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo"
                                :value="old('codigo')" required autofocus autocomplete="codigo" />
                            <x-input-error for="codigo" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="apellidos" value="Apellidos" />
                            <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos"
                                :value="old('apellidos')" required autocomplete="apellidos" />
                            <x-input-error for="apellidos" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="nombres" value="Nombres" />
                            <x-input id="nombres" class="block mt-1 w-full" type="text" name="nombres"
                                :value="old('nombres')" required autocomplete="nombres" />
                            <x-input-error for="nombres" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="dni" value="DNI" />
                            <x-input id="dni" class="block mt-1 w-full" type="text" name="dni"
                                :value="old('dni')" required autocomplete="dni" />
                            <x-input-error for="dni" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="nacimiento" value="Fecha de nacimiento" />
                            <x-input id="nacimiento" class="block mt-1 w-full" type="date" name="nacimiento"
                                :value="old('nacimiento')" required autocomplete="nacimiento" />
                            <x-input-error for="nacimiento" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="sexo" value="Sexo" />
                            <select name="sexo" required
                                class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="telefono" value="Teléfono" />
                            <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono"
                                :value="old('telefono')" required autocomplete="telefono" />
                            <x-input-error for="telefono" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="email" value="Email" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="email" />
                            <x-input-error for="email" class="mt-2" />
                        </div class="mt-2">
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="direccion" value="Dirección" />
                            <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                                :value="old('direccion')" required autocomplete="direccion" />
                            <x-input-error for="direccion" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-label style="color: #000000;" for="observaciones" value="Observaciones" />
                            <textarea name="observaciones" id="observaciones" cols="30" rows="5"
                                class="border-gray-300 dark:border-gray-700 rounded-md shadow-sm block mt-1 w-full"
                                required>{{ old('observaciones') }}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button style="background:#4f46e5; color: white;" class=" ms-4">Crear paciente </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-crud-layout>