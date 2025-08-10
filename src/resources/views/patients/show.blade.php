<x-crud-layout>
    <x-slot name="title">
        Detalle del paciente
    </x-slot>

    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F2EBDC] overflow-hidden shadow-lg sm:rounded-lg border border-[#03658C]">
                <div class="p-6 bg-[#7EB0F2] border-b border-[#03658C] rounded-t-lg">
                    <div class="mb-6">
                        <a href="{{ route('patients.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-[#03658C] hover:bg-[#024B6B] active:bg-[#013946] text-white rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#03658C] transition duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>
                            Volver
                        </a>
                    </div>

                    <div class="space-y-4 text-black text-sm">
                        <div>
                            <strong class="font-semibold">Código:</strong> {{ $patient->codigo }}
                        </div>
                        <div>
                            <strong class="font-semibold">Apellidos:</strong> {{ $patient->apellidos }}
                        </div>
                        <div>
                            <strong class="font-semibold">Nombres:</strong> {{ $patient->nombres }}
                        </div>
                        <div>
                            <strong class="font-semibold">DNI:</strong> {{ $patient->dni }}
                        </div>
                        <div>
                            <strong class="font-semibold">Fecha de nacimiento:</strong> {{ $patient->nacimiento }}
                        </div>
                        <div>
                            <strong class="font-semibold">Sexo:</strong> {{ $patient->sexo }}
                        </div>
                        <div>
                            <strong class="font-semibold">Teléfono:</strong> {{ $patient->telefono }}
                        </div>
                        <div>
                            <strong class="font-semibold">Email:</strong> {{ $patient->email }}
                        </div>
                        <div>
                            <strong class="font-semibold">Dirección:</strong> {{ $patient->direccion }}
                        </div>
                        <div>
                            <strong class="font-semibold">Observaciones:</strong> {{ $patient->observaciones }}
                        </div>
                        <div>
                            <strong class="font-semibold">Terapeuta:</strong>
                            @if($patient->therapist)
                                {{ $patient->therapist->name }}
                            @else
                                <em class="text-[#7EB0F2]">No asignado</em>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-crud-layout>