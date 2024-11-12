<x-crud-layout>
    <x-slot name="title" class="text-2xl font-bold mb-4">Detalle del paciente</x-slot>
    <a href="{{ route('patients.index') }}"
        class="inline-flex items-center px-4 py-2 mb-2 bg-azullogo border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
        Volver
    </a>
    @php
        $fields = [
            'Código' => $patient->codigo,
            'Apellidos' => $patient->apellidos,
            'Nombres' => $patient->nombres,
            'DNI' => $patient->dni,
            'Fecha de nacimiento' => $patient->nacimiento,
            'Sexo' => $patient->sexo,
            'Teléfono' => $patient->telefono,
            'Email' => $patient->email,
            'Dirección' => $patient->direccion,
            'Observaciones' => $patient->observaciones,
        ];
    @endphp

    @foreach($fields as $label => $value)
        <p class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 p-2">
            <span class="font-semibold">{{ $label }}:</span> {{ $value }}
        </p>
    @endforeach
</x-crud-layout>

