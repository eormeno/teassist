<x-crud-layout>
    <x-slot name="title">Modificar actividad de {{ $patient_full_name }}</x-slot>
    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-#F2EBDC overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-[#F2EBDC] border-b border-[#7EB0F2]">
                    <div>
                        <a href="{{ route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]) }}">
                            <div
                                class="inline-flex items-center px-4 py-2 mb-2 bg-[#03658C] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#7EB0F2] active:bg-[#03658C] focus:outline-none focus:border-[#03658C] focus:ring ring-[#7EB0F2] disabled:opacity-25 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    {{-- información de la actividad --}}
                    <div class="mt-2 bg-[#F2EBDC] border border-[#7EB0F2] rounded-md p-4 shadow-md">
                        <x-label for="activity_id" value="Actividad" class="text-[#03658C]" />
                        <input type="text" name="activity_id" id="activity_id"
                            class="border-[#7EB0F2] rounded-md shadow-sm block mt-1 w-full text-[#03658C]"
                            value="{{ $patientActivity->activity->name }}" readonly>
                        <textarea name="description" id="description" cols="30" rows="2"
                            class="border-[#7EB0F2] rounded-md shadow-sm block mt-1 w-full text-[#03658C]"
                            readonly>{{ $patientActivity->activity->description }}</textarea>
                    </div>
                    {{-- Formulario para modificar actividad --}}
                    <form action="{{ route('patient-activities.update', ['patient_activity' => $patientActivity->id]) }}" method="POST"
                        class="mt-2" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <x-label for="description" value="Descripción" class="text-[#03658C]" />
                            <textarea name="description" id="description" cols="30" rows="2"
                                class="border-[#7EB0F2] rounded-md shadow-sm block mt-1 w-full text-[#03658C]"
                                required>{{ old('description', $patientActivity->description) }}</textarea>
                        </div>
                        <div class="mt-2">
                            <x-label for="reasons" value="Razones" class="text-[#03658C]" />
                            <textarea name="reasons" id="reasons" cols="30" rows="2"
                                class="border-[#7EB0F2] rounded-md shadow-sm block mt-1 w-full text-[#03658C]"
                                required>{{ old('reasons', $patientActivity->reasons) }}</textarea>
                        </div>
                        <div class="mt-2">
                            <x-label for="goals" value="Objetivos" class="text-[#03658C]" />
                            <textarea name="goals" id="goals" cols="30" rows="2"
                                class="border-[#7EB0F2] rounded-md shadow-sm block mt-1 w-full text-[#03658C]"
                                required>{{ old('goals', $patientActivity->goals) }}</textarea>
                        </div>
                        <div class="mt-2">
                            <x-label for="indicators" value="Indicadores" class="text-[#03658C]" />
                            <textarea name="indicators" id="indicators" cols="30" rows="2"
                                class="border-[#7EB0F2] rounded-md shadow-sm block mt-1 w-full text-[#03658C]"
                                required>{{ old('indicators', $patientActivity->indicators) }}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ms-4 bg-[#F25430] hover:bg-[#F2B749] text-white font-bold">
                                Actualizar actividad
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-crud-layout>