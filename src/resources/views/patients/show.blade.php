<x-crud-layout>
    <x-slot name="title">Detalle del paciente</x-slot>

    <!-- Botón de regreso -->
    <x-button onclick="location.href='{{ route('patients.index') }}'" class="inline-flex items-center px-4 py-2 mb-2 font-semibold text-xs disabled:opacity-25 transition ease-in-out duration-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </x-button>

    <!-- Contenedor principal -->
    <div class="grid grid-cols-2 gap-4 p-6 bg-white rounded-lg shadow-md border border-gray-200">

        <!-- Información personal -->
        <div>
            <h3 class="text-lg font-semibold text-[#A0A8FF] mb-2">Información Personal</h3>
            <p><strong>Código:</strong> {{ $patient->codigo }}</p>
            <p><strong>Apellidos:</strong> {{ $patient->apellidos }}</p>
            <p><strong>Nombres:</strong> {{ $patient->nombres }}</p>
            <p><strong>DNI:</strong> {{ $patient->dni }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ $patient->nacimiento }}</p>
            <p><strong>Sexo:</strong> {{ $patient->sexo }}</p>
        </div>

        <!-- Información de contacto -->
        <div>
            <h3 class="text-lg font-semibold text-[#A0A8FF] mb-2">Información de Contacto</h3>
            <p><strong>Teléfono:</strong> {{ $patient->telefono }}</p>
            <p><strong>Email:</strong> {{ $patient->email }}</p>
            <p><strong>Dirección:</strong> {{ $patient->direccion }}</p>
        </div>

        <!-- Observaciones -->
        <div class="col-span-2 mt-4">
            <h3 class="text-lg font-semibold text-[#A0A8FF] mb-2">Observaciones</h3>
            <p>{{ $patient->observaciones }}</p>
        </div>
    </div>
</x-crud-layout>
