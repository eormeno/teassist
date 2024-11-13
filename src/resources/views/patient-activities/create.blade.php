<x-crud-layout class="bg-gray-900">
    <x-slot name="title">
        <h1 class="text-2xl font-bold text-gray-100">Nueva actividad al paciente {{ $patient_full_name }}</h1>
    </x-slot>

    {{-- Back Button --}}
    <a href="{{ route('patient-activities.index', ['patient_id' => $patient_id]) }}"
        class="inline-flex items-center px-4 py-2 mb-6 bg-gray-800 border border-gray-700 rounded-lg text-gray-300 hover:bg-gray-700 transition duration-150 ease-in-out group">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-5 h-5 mr-2 group-hover:transform group-hover:-translate-x-1 transition-transform">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        <span class="text-sm font-medium">Volver</span>
    </a>

    <form action="{{ route('patient-activities.store', ['patient_id' => $patient_id]) }}"
          method="POST"
          class="space-y-6 bg-gray-800 p-6 rounded-xl shadow-xl"
          novalidate
          enctype="multipart/form-data">
        @csrf

        {{-- Activity Selection --}}
        <div>
            <label for="activity_id" class="block text-sm font-medium text-gray-300 mb-2">
                Actividad
            </label>
            <select id="activity_id"
                    name="activity_id"
                    class="w-full bg-gray-700 border-gray-600 text-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                    required>
                <option value="" class="bg-gray-700">Seleccionar actividad</option>
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}" class="bg-gray-700">{{ $activity->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Text Areas --}}
        @foreach ([
            'description' => 'Descripción',
            'reasons' => 'Razones',
            'goals' => 'Objetivos',
            'indicators' => 'Indicadores'
        ] as $field => $label)
            <div>
                <label for="{{ $field }}" class="block text-sm font-medium text-gray-300 mb-2">
                    {{ $label }}
                </label>
                <textarea
                    id="{{ $field }}"
                    name="{{ $field }}"
                    rows="3"
                    class="w-full bg-gray-700 border-gray-600 text-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out resize-none"
                    required
                >{{ old($field) }}</textarea>
            </div>
        @endforeach

        {{-- Submit Button --}}
        <div class="flex justify-end">
            <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition duration-150 ease-in-out">
                Asignar actividad
            </button>
        </div>
    </form>
</x-crud-layout>
