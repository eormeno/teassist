<x-crud-layout>
	<x-slot name="title">Editar paciente</x-slot>
    <a href="{{ route('patients.index') }}"
        class="inline-flex items-center px-4 py-2 mb-2 bg-azullogo border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
        Volver
    </a>
    <x-validation-errors class="mb-4" />
    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-2">
            <x-label for="codigo" value="Código"/>
            <x-input class="block mt-1 w-full" type="text" name="codigo" value="{{ $patient->codigo }}" required/>
        </div>

        <div class="mt-2">
            <x-label for="apellidos" value="Apellidos"/>
            <x-input class="block mt-1 w-full" type="text" name="apellidos" value="{{ $patient->apellidos }}" required/>
        </div>

        <div class="mt-2">
            <x-label for="nombres" value="Nombres"/>
            <x-input class="block mt-1 w-full" type="text" name="nombres" value="{{ $patient->nombres }}" required/>
        </div>

        <div class="mt-2">
            <x-label for="dni" value="DNI"/>
            <x-input class="block mt-1 w-full" type="text" name="dni" value="{{ $patient->dni }}" required/>
        </div>

        <div class="mt-2">
            <x-label for="nacimiento" value="Fecha de nacimiento"/>
            <x-input class="block mt-1 w-full" type="date" name="nacimiento" value="{{ $patient->nacimiento }}" required/>
        </div>

        <div class="mt-2">
            <x-label for="sexo" value="Sexo"/>
            <select name="sexo" required
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                <option value="M" @if ($patient->sexo == 'M') selected @endif>Masculino</option>
                <option value="F" @if ($patient->sexo == 'F') selected @endif>Femenino</option>
            </select>
        </div>

        <div class="mt-2">
            <x-label for="telefono" value="Teléfono"/>
            <x-input class="block mt-1 w-full" type="text" name="telefono" value="{{ $patient->telefono }}" required/>
        </div>

        <div class="mt-2">
            <x-label for="email" value="Email"/>
            <x-input class="block mt-1 w-full" type="email" name="email" value="{{ $patient->email }}" required/>
        </div>

        <div class="mt-2">
            <x-label for="direccion" value="Dirección"/>
            <x-input class="block mt-1 w-full" type="text" name="direccion" value="{{ $patient->direccion }}" required/>
        </div>

        <div class="mt-2">
            <x-label for="observaciones" value="Observaciones"/>
            <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                name="observaciones">{{ $patient->observaciones }}
            </textarea>
        </div>
        <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">Guardar Paciente</x-button>
         </div>
    </form>
</x-crud-layout>
