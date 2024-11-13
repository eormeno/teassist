<x-crud-layout>
    <x-slot name="title">
        <h1 class="text-2xl font-bold text-gray-100">Modificar actividad de {{ $patient_full_name }}</h1>
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

    <!-- Activity Information Card -->
    <div class="bg-gray-800 rounded-lg p-6 shadow-lg mb-6 border border-gray-700">
        <div class="space-y-4">
            <div>
                <x-label for="activity_id" value="Actividad" class="text-gray-300 text-sm font-medium mb-2" />
                <input type="text" name="activity_id" id="activity_id"
                    class="w-full bg-gray-700 text-gray-200 border-gray-600 rounded-lg focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200"
                    value="{{ $patientActivity->activity->name }}" readonly>
            </div>
            <div>
                <textarea name="description" id="description" rows="2"
                    class="w-full bg-gray-700 text-gray-200 border-gray-600 rounded-lg focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200"
                    readonly>{{ $patientActivity->activity->description }}</textarea>
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('patient-activities.update', ['patient_activity' => $patientActivity->id]) }}" method="POST"
        class="bg-gray-800 rounded-lg p-6 shadow-lg border border-gray-700" novalidate enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <!-- Description -->
            <div>
                <x-label for="description" value="Descripción" class="text-gray-300 text-sm font-medium mb-2" />
                <textarea name="description" id="description" rows="3"
                    class="w-full bg-gray-700 text-gray-200 border-gray-600 rounded-lg focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200"
                    required>{{ old('description', $patientActivity->description) }}</textarea>
            </div>

            <!-- Reasons -->
            <div>
                <x-label for="reasons" value="Razones" class="text-gray-300 text-sm font-medium mb-2" />
                <textarea name="reasons" id="reasons" rows="3"
                    class="w-full bg-gray-700 text-gray-200 border-gray-600 rounded-lg focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200"
                    required>{{ old('reasons', $patientActivity->reasons) }}</textarea>
            </div>

            <!-- Goals -->
            <div>
                <x-label for="goals" value="Objetivos" class="text-gray-300 text-sm font-medium mb-2" />
                <textarea name="goals" id="goals" rows="3"
                    class="w-full bg-gray-700 text-gray-200 border-gray-600 rounded-lg focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200"
                    required>{{ old('goals', $patientActivity->goals) }}</textarea>
            </div>

            <!-- Indicators -->
            <div>
                <x-label for="indicators" value="Indicadores" class="text-gray-300 text-sm font-medium mb-2" />
                <textarea name="indicators" id="indicators" rows="3"
                    class="w-full bg-gray-700 text-gray-200 border-gray-600 rounded-lg focus:border-purple-500 focus:ring-purple-500 transition-colors duration-200"
                    required>{{ old('indicators', $patientActivity->indicators) }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-8">
                <button type="submit"
                    class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    <span>Actualizar actividad</span>
                </button>
            </div>
        </div>
    </form>
</x-crud-layout>
