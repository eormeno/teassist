<x-crud-layout>
    <x-slot name="title">
        Modificar Actividad de {{ $patient_full_name }}
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">
        <a href="{{ route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]) }}"
            class="inline-flex items-center px-4 py-2 mb-4 bg-indigo-600 text-white font-semibold rounded-md transition ease-in-out duration-150 hover:bg-indigo-700 focus:bg-indigo-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Volver
        </a>

        {{-- Información de la Actividad --}}
        <div class="border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
            <x-label for="activity_id" value="Actividad" class="font-semibold" />
            <input type="text" name="activity_id" id="activity_id"
                class="border-gray-300 bg-gray-50 text-gray-700 rounded-md shadow-sm block mt-1 w-full"
                value="{{ $patientActivity->activity->name }}" readonly />
            <textarea name="description" id="description" cols="30" rows="2"
                class="border-gray-300 bg-gray-50 text-gray-700 rounded-md shadow-sm block mt-1 w-full"
                readonly>{{ $patientActivity->activity->description }}</textarea>
        </div>

        {{-- Formulario para Modificar Actividad --}}
        <form action="{{ route('patient-activities.update', ['patient_activity' => $patientActivity->id]) }}" method="POST"
            class="space-y-6" novalidate enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <x-label for="description" value="Descripción" />
                <textarea name="description" id="description" cols="30" rows="2"
                    class="border-gray-300 bg-white text-gray-700 rounded-md shadow-sm block mt-1 w-full"
                    required>{{ old('description', $patientActivity->description) }}</textarea>
            </div>

            <div>
                <x-label for="reasons" value="Razones" />
                <textarea name="reasons" id="reasons" cols="30" rows="2"
                    class="border-gray-300 bg-white text-gray-700 rounded-md shadow-sm block mt-1 w-full"
                    required>{{ old('reasons', $patientActivity->reasons) }}</textarea>
            </div>

            <div>
                <x-label for="goals" value="Objetivos" />
                <textarea name="goals" id="goals" cols="30" rows="2"
                    class="border-gray-300 bg-white text-gray-700 rounded-md shadow-sm block mt-1 w-full"
                    required>{{ old('goals', $patientActivity->goals) }}</textarea>
            </div>

            <div>
                <x-label for="indicators" value="Indicadores" />
                <textarea name="indicators" id="indicators" cols="30" rows="2"
                    class="border-gray-300 bg-white text-gray-700 rounded-md shadow-sm block mt-1 w-full"
                    required>{{ old('indicators', $patientActivity->indicators) }}</textarea>
            </div>

            <div class="flex justify-end">
                <x-button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md px-4 py-2">
                    Actualizar Actividad
                </x-button>
            </div>
        </form>
    </div>
</x-crud-layout>
