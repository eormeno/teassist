<x-crud-layout>
    <x-slot name="title">
        {{ __('Nueva actividad al paciente') }} {{ $patient_full_name }}
    </x-slot>

    <x-validation-errors class="mb-4" />

    <form action="{{ route('patient-activities.store', ['patient_id' => $patient_id]) }}" method="POST"
        class="space-y-4" novalidate enctype="multipart/form-data">
        @csrf

        <div class="form-grid">
            <!-- Actividad -->
            <div>
                <x-label for="activity_id" :value="__('Actividad')" class="font-semibold label-custom-blue" />
                <select id="activity_id" name="activity_id"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>
                    <option value="">Seleccionar actividad</option>
                    @foreach ($activities as $activity)
                        <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="activity_id" class="mt-2" />
            </div>

            <!-- Descripción -->
            <div class="col-span-2">
                <x-label for="description" :value="__('Descripción')" class="font-semibold label-custom-blue" />
                <textarea name="description" id="description" rows="4"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>{{ old('description') }}</textarea>
                <x-input-error for="description" class="mt-2" />
            </div>

            <!-- Razones -->
            <div class="col-span-2">
                <x-label for="reasons" :value="__('Razones')" class="font-semibold label-custom-blue" />
                <textarea name="reasons" id="reasons" rows="4"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>{{ old('reasons') }}</textarea>
                <x-input-error for="reasons" class="mt-2" />
            </div>

            <!-- Objetivos -->
            <div class="col-span-2">
                <x-label for="goals" :value="__('Objetivos')" class="font-semibold label-custom-blue" />
                <textarea name="goals" id="goals" rows="4"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>{{ old('goals') }}</textarea>
                <x-input-error for="goals" class="mt-2" />
            </div>

            <!-- Indicadores -->
            <div class="col-span-2">
                <x-label for="indicators" :value="__('Indicadores')" class="font-semibold label-custom-blue" />
                <textarea name="indicators" id="indicators" rows="4"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>{{ old('indicators') }}</textarea>
                <x-input-error for="indicators" class="mt-2" />
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-6">
            <!-- Botón "Asignar actividad" -->
            <x-button type="submit" class="btn-primary">
                {{ __('Asignar actividad') }}
            </x-button>
            <!-- Botón "Volver" -->
            <a href="{{ route('patient-activities.index', ['patient_id' => $patient_id]) }}" class="btn-secondary">
                {{ __('Volver') }}
            </a>
        </div>
    </form>
</x-crud-layout>
