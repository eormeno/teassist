<!-- resources/views/patients/create.blade.php -->
<x-crud-layout>
    <x-slot name="title">Nuevo Paciente</x-slot>
    
    <div class="py-12">
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
    
                    <form action="{{ route('patients.store') }}" method="POST" novalidate class="space-y-6 text-[#03658C]">
                        @csrf
    
                        <div>
                            <x-label for="codigo" value="Código" class="font-semibold" style="color: #03658C" />
                            <x-input id="codigo" name="codigo" type="text" value="{{ old('codigo') }}" required autofocus autocomplete="codigo"
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                            <x-input-error for="codigo" class="mt-2" />
                        </div>
    
                        <div>
                            <x-label for="apellidos" value="Apellidos" class="font-semibold" style="color: #03658C" />
                            <x-input id="apellidos" name="apellidos" type="text" value="{{ old('apellidos') }}" required autocomplete="apellidos"
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                            <x-input-error for="apellidos" class="mt-2" />
                        </div>
    
                        <div>
                            <x-label for="nombres" value="Nombres" class="font-semibold" style="color: #03658C" />
                            <x-input id="nombres" name="nombres" type="text" value="{{ old('nombres') }}" required autocomplete="nombres"
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                            <x-input-error for="nombres" class="mt-2" />
                        </div>
    
                        <div>
                            <x-label for="dni" value="DNI" class="font-semibold" style="color: #03658C" />
                            <x-input id="dni" name="dni" type="text" value="{{ old('dni') }}" required autocomplete="dni"
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                            <x-input-error for="dni" class="mt-2" />
                        </div>
    
                        <div>
                            <x-label for="nacimiento" value="Fecha de nacimiento" class="font-semibold" style="color: #03658C" />
                            <x-input id="nacimiento" name="nacimiento" type="date" value="{{ old('nacimiento') }}" required autocomplete="nacimiento"
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                            <x-input-error for="nacimiento" class="mt-2" />
                        </div>
    
                        <div>
                            <x-label for="sexo" value="Sexo" class="font-semibold" style="color: #03658C" />
                            <select id="sexo" name="sexo" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B] text-black">
                                <option value="M" @if(old('sexo') == 'M') selected @endif>Masculino</option>
                                <option value="F" @if(old('sexo') == 'F') selected @endif>Femenino</option>
                            </select>
                        </div>
    
                        <div>
                            <x-label for="telefono" value="Teléfono" class="font-semibold" style="color: #03658C" />
                            <x-input id="telefono" name="telefono" type="text" value="{{ old('telefono') }}" required autocomplete="telefono"
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                            <x-input-error for="telefono" class="mt-2" />
                        </div>
    
                        <div>
                            <x-label for="email" value="Email" class="font-semibold" style="color: #03658C" />
                            <x-input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                            <x-input-error for="email" class="mt-2" />
                        </div>
    
                        <div>
                            <x-label for="direccion" value="Dirección" class="font-semibold" style="color: #03658C" />
                            <x-input id="direccion" name="direccion" type="text" value="{{ old('direccion') }}" required autocomplete="direccion"
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]" />
                            <x-input-error for="direccion" class="mt-2" />
                        </div>
    
                        <div>
                            <x-label for="observaciones" value="Observaciones" class="font-semibold" style="color: #03658C" />
                            <textarea id="observaciones" name="observaciones" rows="5" required
                                class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B]">{{ old('observaciones') }}</textarea>
                        </div>
    
                        @if(auth()->user()->hasRole('root'))
                            <div>
                                <x-label for="therapist_id" value="Terapeuta asignado" class="font-semibold" style="color: #03658C" />
                                <select id="therapist_id" name="therapist_id"
                                    class="block mt-1 w-full rounded-md border border-[#03658C] px-3 py-2 shadow-sm focus:border-[#024B6B] focus:ring focus:ring-[#024B6B] text-black">
                                    <option value="">-- Seleccione un terapeuta --</option>
                                    @foreach($therapists as $therapist)
                                        <option value="{{ $therapist->id }}" @if(old('therapist_id') == $therapist->id) selected @endif>
                                            {{ $therapist->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error for="therapist_id" class="mt-2" />
                            </div>
                        @endif
    
                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="px-8 py-3 bg-[#03658C] hover:bg-[#024B6B] active:bg-[#013946] text-white font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#03658C] transition duration-150">
                                Crear paciente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-crud-layout>