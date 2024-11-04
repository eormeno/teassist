<x-crud-layout>
    <div class="bg-gray-900 min-h-screen p-6">
        <x-slot name="title">
            <h1 class="text-2xl font-bold text-white mb-6">Detalle del paciente</h1>
        </x-slot>

        <div class="bg-gray-800 rounded-lg shadow-xl p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Información Personal -->
                <div class="space-y-4">
                    <div class="border-b border-gray-700 pb-4">
                        <h2 class="text-lg font-semibold text-indigo-400 mb-4">Información Personal</h2>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <span class="text-gray-400 w-32">Código:</span>
                                <span class="text-white">{{ $patient->codigo }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-400 w-32">Apellidos:</span>
                                <span class="text-white">{{ $patient->apellidos }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-400 w-32">Nombres:</span>
                                <span class="text-white">{{ $patient->nombres }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-400 w-32">DNI:</span>
                                <span class="text-white">{{ $patient->dni }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-400 w-32">Sexo:</span>
                                <span class="text-white">{{ $patient->sexo }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información de Contacto -->
                <div class="space-y-4">
                    <div class="border-b border-gray-700 pb-4">
                        <h2 class="text-lg font-semibold text-indigo-400 mb-4">Información de Contacto</h2>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <span class="text-gray-400 w-32">Teléfono:</span>
                                <span class="text-white">{{ $patient->telefono }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-400 w-32">Email:</span>
                                <span class="text-white">{{ $patient->email }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-400 w-32">Dirección:</span>
                                <span class="text-white">{{ $patient->direccion }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-400 w-32">F. Nacimiento:</span>
                                <span class="text-white">{{ $patient->nacimiento }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Observaciones -->
            <div class="border-b border-gray-700 pb-4">
                <h2 class="text-lg font-semibold text-indigo-400 mb-4">Observaciones</h2>
                <p class="text-white">{{ $patient->observaciones ?: 'Sin observaciones' }}</p>
            </div>

            <!-- Botones de Acción -->
            <div class="flex space-x-4 pt-4">
                <a href="{{ route('patients.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-700 rounded-lg text-sm text-white hover:bg-gray-600 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver
                </a>
                <a href="{{ route('patients.edit', $patient) }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 rounded-lg text-sm text-white hover:bg-indigo-700 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Editar
                </a>
            </div>
        </div>
    </div>
</x-crud-layout>
