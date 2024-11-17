<x-crud-layout>
    <x-slot name="title">Nueva actividad al paciente {{ $patient_full_name }} </x-slot>

    <x-button onclick="location.href='{{ route('patient-activities.index', ['patient_id' => $patient_id]) }}'" class="inline-flex items-center px-4 py-2 mb-2 font-semibold text-xs disabled:opacity-25 transition ease-in-out duration-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
    </x-button>
    <form action="{{ route('patient-activities.store', ['patient_id' => $patient_id]) }}" method="POST" class="mt-2" novalidate
        enctype="multipart/form-data">
        @csrf
        <!-- A selection of activities -->
        <div class="mb-4">
            <label for="activity_id" class="block text-ellipsis text-sm font-medium text-gray-700">Actividad</label>
            <select id="activity_id" name="activity_id"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-[#E5E7FF] focus:border-[#E5E7FF] sm:text-sm"
                required>
                <option value="">Seleccionar actividad</option>
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-2">
            <x-label for="description" value="Descripción"/>
            <textarea name="description" id="description" cols="30" rows="2"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-200 dark:text-gray-900 focus:border-[#E5E7FF] dark:focus:border-[#A0A8FF] focus:ring-[#E5E7FF] dark:focus:ring-[#A0A8FF] rounded-md shadow-sm block mt-1 w-full"
                required>{{ old('description') }}</textarea>
        </div>
        <div class="mt-2">
            <x-label for="reasons" value="Razones" />
            <textarea name="reasons" id="reasons" cols="30" rows="2"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-200 dark:text-gray-900 focus:border-[#E5E7FF] dark:focus:border-[#A0A8FF] focus:ring-[#E5E7FF] dark:focus:ring-[#A0A8FF] rounded-md shadow-sm block mt-1 w-full"
                required>{{ old('reasons') }}</textarea>
        </div>
        <div class="mt-2">
            <x-label for="goals" value="Objetivos" />
            <textarea name="goals" id="goals" cols="30" rows="2"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-200 dark:text-gray-900 focus:border-[#E5E7FF] dark:focus:border-[#A0A8FF] focus:ring-[#E5E7FF] dark:focus:ring-[#A0A8FF] rounded-md shadow-sm block mt-1 w-full"
                required>{{ old('goals') }}</textarea>
        </div>
        <div class="mt-2">
            <x-label for="indicators" value="Indicadores" />
            <textarea name="indicators" id="indicators" cols="30" rows="2"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-200 dark:text-gray-900 focus:border-[#E5E7FF] dark:focus:border-[#A0A8FF] focus:ring-[#E5E7FF] dark:focus:ring-[#A0A8FF] rounded-md shadow-sm block mt-1 w-full"
                required>{{ old('indicators') }}</textarea>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button class="ms-4">Asignar actividad</x-button>
        </div>
    </form>
</x-crud-layout>
