<x-crud-layout>
    <x-slot name="title">
        {{ __('Nuevo Paciente') }}
    </x-slot>

    <x-validation-errors class="mb-4" />

    <div class="bg-[#f8fafc] p-6 rounded-lg shadow-sm border border-[#a4c2db]/20">
        <form action="{{ route('patients.store') }}" method="POST" class="space-y-4" novalidate>
            @csrf

            <div class="form-grid">
                <!-- Código -->
                <div>
                    <x-label for="codigo" :value="__('Código')" class="font-semibold label-custom-blue"/>
                    <x-input id="codigo" class="block mt-1 w-full input-bg-white " type="text" name="codigo" :value="old('codigo')" required autofocus autocomplete="codigo" />
                    <x-input-error for="codigo" class="mt-2" />
                </div>

                <!-- Apellidos -->
                <div>
                    <x-label for="apellidos" :value="__('Apellidos')" class="font-semibold label-custom-blue"/>
                    <x-input id="apellidos" class="block mt-1 w-full input-bg-white " type="text" name="apellidos" :value="old('apellidos')" required />
                    <x-input-error for="apellidos" class="mt-2" />
                </div>

                <!-- Nombres -->
                <div>
                    <x-label for="nombres" :value="__('Nombres')" class="font-semibold label-custom-blue"/>
                    <x-input id="nombres" class="block mt-1 w-full input-bg-white " type="text" name="nombres" :value="old('nombres')" required />
                    <x-input-error for="nombres" class="mt-2" />
                </div>

                <!-- DNI -->
                <div>
                    <x-label for="dni" :value="__('DNI')" class="font-semibold label-custom-blue"/>
                    <x-input id="dni" class="block mt-1 w-full input-bg-white " type="text" name="dni" :value="old('dni')" required />
                    <x-input-error for="dni" class="mt-2" />
                </div>

                <!-- Fecha de nacimiento -->
                <div>
                    <x-label for="nacimiento" :value="__('Fecha de nacimiento')" class="font-semibold label-custom-blue"/>
                    <x-input id="nacimiento" class="block mt-1 w-full input-bg-white " type="date" name="nacimiento" :value="old('nacimiento')" required />
                    <x-input-error for="nacimiento" class="mt-2" />
                </div>

                <!-- Sexo -->
                <div>
                    <x-label for="sexo" :value="__('Sexo')" class="font-semibold label-custom-blue"/>
                    <select name="sexo" required class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white">
                        <option value="" disabled {{ old('sexo') == '' ? 'selected' : '' }}>Seleccionar...</option>
                        <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                    </select>
                    <x-input-error for="sexo" class="mt-2" />
                </div>

                <!-- Teléfono -->
                <div>
                    <x-label for="telefono" :value="__('Teléfono')" class="font-semibold label-custom-blue"/>
                    <x-input id="telefono" class="block mt-1 w-full input-bg-white " type="text" name="telefono" :value="old('telefono')" required />
                    <x-input-error for="telefono" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-label for="email" :value="__('Email')" class="font-semibold label-custom-blue"/>
                    <x-input id="email" class="block mt-1 w-full input-bg-white" type="email" name="email" :value="old('email')" required />
                    <x-input-error for="email" class="mt-2" />
                </div>

                <!-- Dirección -->
                <div>
                    <x-label for="direccion" :value="__('Dirección')" class="font-semibold label-custom-blue"/>
                    <x-input id="direccion" class="block mt-1 w-full input-bg-white " type="text" name="direccion" :value="old('direccion')" required />
                    <x-input-error for="direccion" class="mt-2" />
                </div>

                <!-- Observaciones -->
                <div class="col-span-2">
                    <x-label for="observaciones" :value="__('Observaciones')" class="font-semibold label-custom-blue"/>
                    <textarea name="observaciones"
                        rows="4"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-white"
                    >{{ old('observaciones') }}</textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <x-button type="submit" class="btn-primary text-white bg-[#0075b2] hover:bg-[#0075b2]/90">
                    {{ __('Guardar') }}
                </x-button>
                <a href="{{ route('patients.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-300 text-[#1E1E49] rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-400 active:bg-gray-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Volver') }}
                </a>
            </div>
        </form>
    </div>
</x-crud-layout>
