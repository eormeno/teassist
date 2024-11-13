<x-crud-layout>
    <x-slot name="title">
        <h1 class="text-2xl font-bold text-gray-100">Listar Actividades</h1>
    </x-slot>

    <!-- Patient Selection -->
    <div class="mb-6">
        <label for="patient_id" class="block text-sm font-medium text-gray-300 mb-2">Paciente</label>
        <div class="relative">
            <select id="patient_id" name="patient_id"
                class="block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 py-3 px-4 pr-8 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200"
                onchange="window.location.href = '/patient-activities?patient_id=' + this.value">
                <option value="" class="bg-gray-700">Seleccionar paciente</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" @if ($patient->id == $patient_id) selected @endif
                        class="bg-gray-700">
                        {{ $patient->apellidos }}, {{ $patient->nombres }}
                    </option>
                @endforeach
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
    </div>

    @if ($patient_id)
        <!-- Add New Activity Button -->
        <div class="mb-6">
            <a href="{{ route('patient-activities.create', ['patient_id' => $patient_id]) }}"
                class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors duration-200 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span class="text-white text-sm font-medium">Nueva Actividad</span>
            </a>
        </div>

        @if ($patientActivities->isEmpty())
            <!-- Empty State -->
            <div class="bg-gray-800 rounded-lg p-8 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-300">No hay actividades registradas</h3>
                <p class="mt-1 text-sm text-gray-500">Comienza agregando una nueva actividad.</p>
            </div>
        @else
            <!-- Activities Table -->
            <div class="bg-gray-800 rounded-lg overflow-hidden shadow-xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Nombre</th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Descripción</th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach ($patientActivities as $key => $patient_activity)
                                <tr class="hover:bg-gray-700 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-100">
                                        {{ $patient_activity->activity->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                        {{ Str::limit($patient_activity->activity->description, 30) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex items-center space-x-4">
                                            <!-- View Button -->
                                            <a href="{{ route('patient-activities.show', $patient_activity) }}"
                                                class="text-purple-400 hover:text-purple-300 transition-colors duration-200">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <!-- Edit Button -->
                                            <a href="{{ route('patient-activities.edit', $patient_activity) }}"
                                                class="text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <!-- Delete Button -->
                                            <form action="{{ route('patient-activities.destroy', $patient_activity) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-400 hover:text-red-300 transition-colors duration-200"
                                                    onclick="return confirm('¿Está seguro de eliminar esta actividad?')">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                <x-slot name="links">
                    {{ $patientActivities->links() }}
                </x-slot>
            </div>
        @endif
    @endif

</x-crud-layout>
