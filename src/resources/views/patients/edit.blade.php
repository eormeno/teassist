<x-crud-layout>
    <div class="bg-gray-900 min-h-screen p-6">
        <x-slot name="title">
            <h1 class="text-2xl font-bold text-white mb-6">Editar paciente</h1>
        </x-slot>

        <div class="bg-gray-800 rounded-lg shadow-xl p-6">
            <form action="{{ route('patients.update', $patient) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Grid for form fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Código -->
                        <div class="space-y-2">
                            <label for="codigo" class="block text-sm font-medium text-gray-300">
                                Código
                            </label>
                            <input type="text" name="codigo" id="codigo"
                                value="{{ $patient->codigo }}"
                                class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                                required>
                        </div>

                        <!-- Apellidos -->
                        <div class="space-y-2">
                            <label for="apellidos" class="block text-sm font-medium text-gray-300">
                                Apellidos
                            </label>
                            <input type="text" name="apellidos" id="apellidos"
                                value="{{ $patient->apellidos }}"
                                class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                                required>
                        </div>

                        <!-- Nombres -->
                        <div class="space-y-2">
                            <label for="nombres" class="block text-sm font-medium text-gray-300">
                                Nombres
                            </label>
                            <input type="text" name="nombres" id="nombres"
                                value="{{ $patient->nombres }}"
                                class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                                required>
                        </div>

                        <!-- DNI -->
                        <div class="space-y-2">
                            <label for="dni" class="block text-sm font-medium text-gray-300">
                                DNI
                            </label>
                            <input type="text" name="dni" id="dni"
                                value="{{ $patient->dni }}"
                                class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                                required>
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div class="space-y-2">
                            <label for="nacimiento" class="block text-sm font-medium text-gray-300">
                                Fecha de nacimiento
                            </label>
                            <input type="date" name="nacimiento" id="nacimiento"
                                value="{{ $patient->nacimiento }}"
                                class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                                required>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Sexo -->
                        <div class="space-y-2">
                            <label for="sexo" class="block text-sm font-medium text-gray-300">
                                Sexo
                            </label>
                            <select name="sexo" id="sexo"
                                class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                                required>
                                <option value="M" @if ($patient->sexo == 'M') selected @endif>Masculino</option>
                                <option value="F" @if ($patient->sexo == 'F') selected @endif>Femenino</option>
                            </select>
                        </div>

                        <!-- Teléfono -->
                        <div class="space-y-2">
                            <label for="telefono" class="block text-sm font-medium text-gray-300">
                                Teléfono
                            </label>
                            <input type="text" name="telefono" id="telefono"
                                value="{{ $patient->telefono }}"
                                class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                                required>
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-300">
                                Email
                            </label>
                            <input type="email" name="email" id="email"
                                value="{{ $patient->email }}"
                                class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                                required>
                        </div>

                        <!-- Dirección -->
                        <div class="space-y-2">
                            <label for="direccion" class="block text-sm font-medium text-gray-300">
                                Dirección
                            </label>
                            <input type="text" name="direccion" id="direccion"
                                value="{{ $patient->direccion }}"
                                class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200"
                                required>
                        </div>
                    </div>
                </div>

                <!-- Observaciones - Full Width -->
                <div class="space-y-2">
                    <label for="observaciones" class="block text-sm font-medium text-gray-300">
                        Observaciones
                    </label>
                    <textarea name="observaciones" id="observaciones" rows="4"
                        class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200">{{ $patient->observaciones }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('patients.index') }}"
                        class="px-4 py-2.5 bg-gray-700 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition-colors duration-200">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-4 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-crud-layout>
