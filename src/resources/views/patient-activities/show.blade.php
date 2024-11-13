<x-crud-layout>
    <x-slot name="title">Mostrar actividad del paciente</x-slot>
    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-gray-300 border-b border-indigo-300">
                    <div class="row">
                        <div class="col-lg-12 margin-tb mb-4">
                            <div>
                                <a href="{{ route('patient-activities.index', ['patient_id' => $patientActivity->patient_id]) }}">
                                    <div class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class=" grid grid-cols-1 gap-4 sm:grid-cols-1">
                            <div class="overflow-hidden shadow rounded-lg">
                                <div class="border rounded-md border-indigo-700 bg-gray-400 px-4 py-5 sm:px-6">
                                    <h3 class="text-lg font-medium leading-6 text-black">Paciente</h3>
                                    <p class="mt-1 max-w -2xl text-sm text-black">
                                        {{ $patientActivity->patient->apellidos }},
                                        {{ $patientActivity->patient->nombres }}</p>
                                </div>
                                
                                <div class="border rounded-md border-indigo-700 bg-gray-400 px-4 py-5 sm:px-6">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Actividad</h3>
                                    <p class="mt-1 max-w
                                    -2xl text-sm text-black">
                                        {{ $patientActivity->activity->name }}</p>
                                </div>
                            
                                <div>
                                    <dl>
                                        <div class="border rounded-md border-indigo-700 bg-gray-400 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-black">Descripción</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                                {{ $patientActivity->description }}
                                            </dd>
                                        </div>
                                        
                                        <div class="border rounded-md border-indigo-700 bg-gray-400 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-black">Razones</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                                {{ $patientActivity->reasons }}
                                            </dd>
                                        </div>
                                        
                                        <div class="border rounded-md border-indigo-700 bg-gray-400 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-black">Objetivos</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                                {{ $patientActivity->goals }}
                                            </dd>
                                        </div>
                                        
                                        <div class="border rounded-md border-indigo-700 bg-gray-400 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-black">Indicadores</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
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
    </div>
</x-crud-layout>