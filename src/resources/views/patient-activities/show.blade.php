<x-crud-layout>
    <x-slot name="title">
        <h1 class="text-2xl font-bold text-gray-100">Mostrar actividad del paciente</h1>
    </x-slot>

    <!-- Back Button -->
    <a href="{{ route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]) }}"
        class="inline-flex items-center px-4 py-2 mb-6 bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors duration-200 group">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-5 h-5 text-white mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        <span class="text-white text-sm font-medium">Volver</span>
    </a>

    <div class="mt-4">
        <div class="max-w-4xl">
            <div class="bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <!-- Patient and Activity Header -->
                <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-700">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-purple-400">Paciente</h3>
                        <p class="mt-2 text-gray-300">
                            {{ $patientActivity->patient->apellidos }},
                            {{ $patientActivity->patient->nombres }}
                        </p>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-purple-400">Actividad</h3>
                        <p class="mt-2 text-gray-300">
                            {{ $patientActivity->activity->name }}
                        </p>
                    </div>
                </div>

                <!-- Details Section -->
                <div class="border-t border-gray-700">
                    <dl class="divide-y divide-gray-700">
                        <!-- Description -->
                        <div class="px-6 py-4 md:grid md:grid-cols-3 md:gap-4">
                            <dt class="text-sm font-medium text-gray-400">Descripción</dt>
                            <dd class="mt-1 text-sm text-gray-300 md:col-span-2 md:mt-0">
                                {{ $patientActivity->description }}
                            </dd>
                        </div>

                        <!-- Reasons -->
                        <div class="px-6 py-4 md:grid md:grid-cols-3 md:gap-4">
                            <dt class="text-sm font-medium text-gray-400">Razones</dt>
                            <dd class="mt-1 text-sm text-gray-300 md:col-span-2 md:mt-0">
                                {{ $patientActivity->reasons }}
                            </dd>
                        </div>

                        <!-- Goals -->
                        <div class="px-6 py-4 md:grid md:grid-cols-3 md:gap-4">
                            <dt class="text-sm font-medium text-gray-400">Objetivos</dt>
                            <dd class="mt-1 text-sm text-gray-300 md:col-span-2 md:mt-0">
                                {{ $patientActivity->goals }}
                            </dd>
                        </div>

                        <!-- Indicators -->
                        <div class="px-6 py-4 md:grid md:grid-cols-3 md:gap-4">
                            <dt class="text-sm font-medium text-gray-400">Indicadores</dt>
                            <dd class="mt-1 text-sm text-gray-300 md:col-span-2 md:mt-0">
                                {{ $patientActivity->indicators }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-crud-layout>
