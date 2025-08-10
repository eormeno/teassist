<x-crud-layout>
    <x-slot name="title">Mostrar actividad del paciente</x-slot>
    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-[#D1E9FF] border-b border-[#03658C] rounded-t-lg">
                    <div>
                        <a href="{{ route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]) }}">
                            <div
                                class="inline-flex items-center px-4 py-2 mb-6 bg-[#03658C] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#024B6B] active:bg-[#013A50] focus:outline-none focus:border-[#013A50] focus:ring ring-[#024B6B] disabled:opacity-25 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </div>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-1">
                        <div class="overflow-hidden shadow rounded-lg">
                            <div class="border-2  border-[#F25430] bg-[#B9D7EA] px-6 py-5 rounded-t-md">
                                <h3 class="text-lg font-semibold text-[#024B6B]">Paciente</h3>
                                <p class="mt-1 text-sm text-black">
                                    {{ $patientActivity->patient->apellidos }}, {{ $patientActivity->patient->nombres }}
                                </p>
                            </div>

                            <div class="border-2 border-[#F25430] bg-[#B9D7EA] px-6 py-5">
                                <h3 class="text-lg font-semibold text-[#024B6B]">Actividad</h3>
                                <p class="mt-1 text-sm text-black">
                                    {{ $patientActivity->activity->name }}
                                </p>
                            </div>

                            <div>
                                <dl>
                                    <div
                                        class="border-2 border-[#F25430] bg-[#B9D7EA] px-6 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 rounded-b-md">
                                        <dt class="text-sm font-semibold text-[#024B6B]">Descripción</dt>
                                        <dd class="mt-1 text-sm text-black sm:col-span-2">
                                            {{ $patientActivity->description }}
                                        </dd>
                                    </div>

                                    <div class="border-2 border-[#F25430] bg-[#B9D7EA] px-6 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-semibold text-[#024B6B]">Razones</dt>
                                        <dd class="mt-1 text-sm text-black sm:col-span-2">
                                            {{ $patientActivity->reasons }}
                                        </dd>
                                    </div>

                                    <div class="border-2 border-[#F25430] bg-[#B9D7EA] px-6 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-semibold text-[#024B6B]">Objetivos</dt>
                                        <dd class="mt-1 text-sm text-black sm:col-span-2">
                                            {{ $patientActivity->goals }}
                                        </dd>
                                    </div>

                                    <div class="border-2 border-[#F25430] bg-[#B9D7EA] px-6 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 rounded-b-md">
                                        <dt class="text-sm font-semibold text-[#024B6B]">Indicadores</dt>
                                        <dd class="mt-1 text-sm text-black sm:col-span-2">
                                            {{ $patientActivity->indicators }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-crud-layout>