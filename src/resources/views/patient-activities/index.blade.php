<x-crud-layout>
    <x-slot name="title">Listar Actividades</x-slot>

    <!-- Selección de paciente -->
    <div class="mb-4">
        <label for="patient_id" class="block text-sm font-medium text-gray-700">Paciente</label>
        <select id="patient_id" name="patient_id"
            class="mt-1 block w-full py-2 px-3 border-2 border-[#a4c2db] bg-white rounded-md shadow-sm focus:outline-none focus:border-[#005c8c] focus:ring-[#005c8c] sm:text-sm"
            onchange="window.location.href = '/patient-activities?patient_id=' + this.value">
            <option value="">Seleccionar paciente</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}" @if ($patient->id == $patient_id) selected @endif>
                    {{ $patient->apellidos }}, {{ $patient->nombres }}
                </option>
            @endforeach
        </select>

    </div>

    @if ($patient_id)
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('patient-activities.create', ['patient_id' => $patient_id]) }}"
                class="inline-flex items-center px-4 py-2 text-white rounded-md font-semibold text-sm  focus:outline-none "
                style="background-color: #0075b2; hover:bg-opacity-90; focus:ring: #0075b2;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Agregar Actividad
            </a>
        </div>

        @if ($patientActivities->isEmpty())
            <div class="text-center">
                <p class="text-gray-500">No hay actividades registradas</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-300 rounded-lg mb-4">
                    <thead class="bg-gray-100 rounded-t-lg">
                        <tr>
                            <th class="py-3 px-4 text-left font-medium">Nombre</th>
                            <th class="py-3 px-4 text-left font-medium">Descripción</th>
                            <th class="py-3 px-4 text-center font-medium">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($patientActivities as $key => $patient_activity)
                            <tr class="{{ $key % 2 === 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100">
                                <td class="py-3 px-4 text-left">{{ $patient_activity->activity->name }}</td>
                                <td class="py-3 px-4 text-left">{{ Str::limit($patient_activity->activity->description, 30) }}</td>
                                <td class="py-3 px-4 flex justify-center space-x-3">
                                    <a href="{{ route('patient-activities.show', $patient_activity) }}"
                                        class="action-btn view-btn bg-[#a4c2db] text-[#1E1E49] py-1 px-2 rounded inline-flex items-center justify-center w-8 h-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('patient-activities.edit', $patient_activity) }}"
                                        class="action-btn edit-btn bg-[#0075b2] text-white py-1 px-2 rounded inline-flex items-center justify-center w-8 h-8"
                                        title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('patient-activities.destroy', $patient_activity) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="delete-btn bg-[#dbf227] text-white py-1 px-2 rounded inline-flex items-center justify-center w-8 h-8"
                                            title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <x-slot name="links">
                {{ $patientActivities->links() }}
            </x-slot>
        @endif
    @endif
</x-crud-layout>
