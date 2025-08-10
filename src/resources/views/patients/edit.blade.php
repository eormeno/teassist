<x-crud-layout>
    <x-slot name="title">
        Editar paciente
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
    
                    <x-validation-errors class="mb-4 text-[#F25430]" />
    
                    <form action="{{ route('patients.update', $patient) }}" method="POST" class="space-y-6 text-[#03658C]">
                        @csrf
                        @method('PATCH')
    
                        <div>
                            <x-label for="codigo" value="Código" class="text-[#03658C] font-semibold" />
                            <x-input id="codigo" name="codigo" type="text" value="{{ $patient->codigo }}" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                        </div>
    
                        <div>
                            <x-label for="apellidos" value="Apellidos" class="text-[#03658C] font-semibold" />
                            <x-input id="apellidos" name="apellidos" type="text" value="{{ $patient->apellidos }}" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                        </div>
    
                        <div>
                            <x-label for="nombres" value="Nombres" class="text-[#03658C] font-semibold" />
                            <x-input id="nombres" name="nombres" type="text" value="{{ $patient->nombres }}" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                        </div>
    
                        <div>
                            <x-label for="dni" value="DNI" class="text-[#03658C] font-semibold" />
                            <x-input id="dni" name="dni" type="text" value="{{ $patient->dni }}" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                        </div>
    
                        <div>
                            <x-label for="nacimiento" value="Fecha de nacimiento" class="text-[#03658C] font-semibold" />
                            <x-input id="nacimiento" name="nacimiento" type="date" value="{{ $patient->nacimiento }}" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                        </div>
    
                        <div>
                            <x-label for="sexo" value="Sexo" class="text-[#03658C] font-semibold" />
                            <select name="sexo" id="sexo" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]">
                                <option value="M" @if ($patient->sexo == 'M') selected @endif>Masculino</option>
                                <option value="F" @if ($patient->sexo == 'F') selected @endif>Femenino</option>
                            </select>
                        </div>
    
                        <div>
                            <x-label for="telefono" value="Teléfono" class="text-[#03658C] font-semibold" />
                            <x-input id="telefono" name="telefono" type="text" value="{{ $patient->telefono }}" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                        </div>
    
                        <div>
                            <x-label for="email" value="Email" class="text-[#03658C] font-semibold" />
                            <x-input id="email" name="email" type="email" value="{{ $patient->email }}" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                        </div>
    
                        <div>
                            <x-label for="direccion" value="Dirección" class="text-[#03658C] font-semibold" />
                            <x-input id="direccion" name="direccion" type="text" value="{{ $patient->direccion }}" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                        </div>
    
                        <div>
                            <x-label for="observaciones" value="Observaciones" class="text-[#03658C] font-semibold" />
                            <textarea id="observaciones" name="observaciones" rows="3"
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]">{{ $patient->observaciones }}</textarea>
                        </div>
    
                        @role('root')
                            <div>
                                <x-label for="therapist_id" value="Terapeuta asignado" class="text-[#03658C] font-semibold" />
                                <select name="therapist_id" id="therapist_id" required
                                    class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B] text-black">
                                    <option value="">-- Seleccione un terapeuta --</option>
                                    @foreach ($therapists as $therapist)
                                        <option value="{{ $therapist->id }}" @if ($patient->therapist_id == $therapist->id) selected @endif>
                                            {{ $therapist->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endrole
    
                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="px-8 py-3 bg-[#03658C] hover:bg-[#024B6B] active:bg-[#013946] text-white font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#03658C] transition duration-150">
                                Editar Paciente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-crud-layout>