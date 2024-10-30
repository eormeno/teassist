<x-crud-layout>
    <x-slot name="title">Mostrar actividad del paciente</x-slot>

    {{-- Botón para regresar a la lista de actividades --}}
    <a href="{{ route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]) }}" class="inline-flex items-center px-4 py-2 mb-4 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        Volver a actividades
    </a>

    {{-- Información del paciente y la actividad --}}
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mt-4">
        <h3 class="text-lg font-semibold leading-6 text-gray-900 dark:text-gray-100">Detalles de la Actividad del Paciente</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4">
            {{-- Paciente --}}
            <div>
                <h4 class="text-sm font-medium text-gray-600 dark:text-gray-400">Paciente</h4>
                <p class="text-base font-semibold text-gray-900 dark:text-gray-200">
                    {{ $patientActivity->patient->apellidos }}, {{ $patientActivity->patient->nombres }}
                </p>
            </div>
            {{-- Actividad --}}
            <div>
                <h4 class="text-sm font-medium text-gray-600 dark:text-gray-400">Actividad</h4>
                <p class="text-base font-semibold text-gray-900 dark:text-gray-200">
                    {{ $patientActivity->activity->name }}
                </p>
            </div>
        </div>

        {{-- Detalles de la actividad --}}
        <div class="border-t border-gray-200 dark:border-gray-700 mt-6 pt-6">
            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Descripción</dt>
                    <dd class="text-base text-gray-900 dark:text-gray-200">{{ $patientActivity->description }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Razones</dt>
                    <dd class="text-base text-gray-900 dark:text-gray-200">{{ $patientActivity->reasons }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Objetivos</dt>
                    <dd class="text-base text-gray-900 dark:text-gray-200">{{ $patientActivity->goals }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Indicadores</dt>
                    <dd class="text-base text-gray-900 dark:text-gray-200">{{ $patientActivity->indicators }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-crud-layout>
