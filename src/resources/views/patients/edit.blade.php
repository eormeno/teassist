<x-crud-layout>
    <x-slot name="title">
        Editar paciente
    </x-slot>

    <div class="py-14">
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
                    <x-validation-errors class="mb-4" />
                    <form action="{{ route('patients.update', $patient) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mt-4">
                            <x-label for="codigo" style="color: #000000;" value="Código" />
                            <x-input class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full" type="text" name="codigo" value="{{$patient->codigo}}" required/>
                        </div>
                        <div class="mt-4">
                            <x-label for="apellidos" style="color: #000000;" value="Apellidos" />
                            <x-input class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full" type="text" name="apellidos" value="{{$patient->apellidos}}" required/>
                        </div>
                        <div class="mt-4" >
                            <x-label for="nombres" style="color: #000000;" value="Nombres" />
                            <x-input class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full" type="text" name="nombres" value="{{$patient->nombres}}" required/>
                        </div>
                        <div class="mt-4">
                            <x-label for="dni" style="color: #000000;" value="DNI" />
                            <x-input class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full" type="text" name="dni" value="{{$patient->dni}}" required/>
                        </div>
                        <div class="mt-4">
                            <x-label for="nacimiento" style="color: #000000;" value="Fecha de nacimiento" />
                            <x-input class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full" type="date" name="nacimiento" value="{{$patient->nacimiento}}" required/>
                        </div>
                        <div class="mt-4">
                            <x-label for="sexo"  style="color: #000000;" value="Sexo" />
                            <select name="sexo" required class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full"
                                <option value="M" @if ($patient->sexo == 'M') selected @endif>Masculino</option>
                                <option value="F" @if ($patient->sexo == 'F') selected @endif>Femenino</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="telefono" style="color: #000000;" value="Teléfono" />
                            <x-input class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full" type="text" name="telefono" value="{{$patient->telefono}}" required/>
                        </div>
                        <div class="mt-4">
                            <x-label for="email" style="color: #000000;" value="Email" />
                            <x-input class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full" type="email" name="email" value="{{$patient->email}}" required/>
                        </div>
                        <div class="mt-4">
                            <x-label for="direccion" style="color: #000000;" value="Dirección" />
                            <x-input class="border-gray-300 dark:border-gray-700  rounded-md shadow-sm block mt-1 w-full" type="text" name="direccion" value="{{$patient->direccion}}" required/>
                        </div>
                        <div class="mt-4">
                            <x-label for="observaciones" style="color: #000000;" value="Observaciones"/>
                            <textarea name="observaciones">{{$patient->observaciones}}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ms-4 py-4 px-6 text-xl" style="background-color: #4f46e5; color: white;" type="submit">
                                Editar Paciente
                            </x-button>                            
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-crud-layout>