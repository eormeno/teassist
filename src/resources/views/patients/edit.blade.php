<x-crud-layout>
    <x-slot name="title">Editar paciente</x-slot>

    <!-- Botón de regreso -->
    <x-button onclick="location.href='{{ route('patients.index') }}'" class="inline-flex items-center px-4 py-2 mb-4 font-semibold text-xs disabled:opacity-25 transition ease-in-out duration-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
    </x-button>

    <!-- Formulario de edición del paciente -->
    <form action="{{ route('patients.update', $patient) }}" method="POST" class="bg-white p-4 rounded-md w-full  mx-auto">
        @csrf
        @method('PUT')

        <h2 class="text-center text-2xl font-semibold mb-4">Editar Paciente</h2>

        <div class="grid grid-cols-2 gap-4">
            <!-- Columna Izquierda -->
            <div>
                <label for="codigo" class="block font-semibold mb-1">Código</label>
                <input type="text" name="codigo" value="{{ $patient->codigo }}" required class="w-full border rounded px-2 py-1">
            </div>

            <div>
                <label for="dni" class="block font-semibold mb-1">DNI</label>
                <input type="text" name="dni" value="{{ $patient->dni }}" required class="w-full border rounded px-2 py-1">
            </div>

            <div>
                <label for="apellidos" class="block font-semibold mb-1">Apellidos</label>
                <input type="text" name="apellidos" value="{{ $patient->apellidos }}" required class="w-full border rounded px-2 py-1">
            </div>

            <div>
                <label for="nombres" class="block font-semibold mb-1">Nombres</label>
                <input type="text" name="nombres" value="{{ $patient->nombres }}" required class="w-full border rounded px-2 py-1">
            </div>

            <div>
                <label for="nacimiento" class="block font-semibold mb-1">Fecha de nacimiento</label>
                <input type="date" name="nacimiento" value="{{ $patient->nacimiento }}" required class="w-full border rounded px-2 py-1">
            </div>

            <div>
                <label for="sexo" class="block font-semibold mb-1">Sexo</label>
                <select name="sexo" required class="w-full border rounded px-2 py-1">
                    <option value="M" @if ($patient->sexo == 'M') selected @endif>Masculino</option>
                    <option value="F" @if ($patient->sexo == 'F') selected @endif>Femenino</option>
                </select>
            </div>

            <div>
                <label for="telefono" class="block font-semibold mb-1">Teléfono</label>
                <input type="text" name="telefono" value="{{ $patient->telefono }}" required class="w-full border rounded px-2 py-1">
            </div>

            <div>
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ $patient->email }}" required class="w-full border rounded px-2 py-1">
            </div>

            <div class="col-span-2">
                <label for="direccion" class="block font-semibold mb-1">Dirección</label>
                <input type="text" name="direccion" value="{{ $patient->direccion }}" required class="w-full border rounded px-2 py-1">
            </div>

            <div class="col-span-2">
                <label for="observaciones" class="block font-semibold mb-1">Observaciones</label>
                <textarea name="observaciones" class="w-full border rounded px-2 py-1">{{ $patient->observaciones }}</textarea>
            </div>
        </div>

        <!-- Botón de guardar cambios -->
        <div class="text-end mt-6">
            <x-button type="submit" class="px-4 py-2 font-semibold text-xs disabled:opacity-25 transition ease-in-out duration-150">
                Guardar
            </x-button>
        </div>
    </form>
</x-crud-layout>
