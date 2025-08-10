<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                @role('registered')
                    <div class="m-4 text-xl text-black ">
                        <b>Usted está registrado en el sistema.</b><br> Para poder acceder a funcionalidades
                         específicas, debe dirigirse personalmente al área de administración de la
                         organización.
                    </div>
                @endrole
                @role('therapist')
                    <div class="m-4 text-xl text-black ">
                        <b>Usted está registrado en el sistema como terapeuta.</b><br> Puede visualizar sus pacientes, como así también crear actividades y asignar las mismas a sus pacientes.
                    </div>
                @endrole
                @role('users-admin')
                    <div class="m-4 text-xl text-black ">
                        <b>Usted está registrado en el sistema como users-admin.</b><br> Puede administrar los usuarios.
                    </div>
                @endrole
                @role('roles-admin')
                    <div class="m-4 text-xl text-black ">
                        <b>Usted está registrado en el sistema como roles-admin.</b><br> Puede administrar los roles.
                    </div>
                @endrole
                @role('root')
                    <div class="m-4 text-xl text-black">
                        <b>Usted es usuario root.</b><br> Puede acceder a todas las funcionalidades del sistema.
                    </div>
                @endrole
                @role('patient')
                    @php
                        $patient = Auth::user()->patient;
                        $activities = $patient ? $patient->activities : collect();
                        $therapist = $patient && $patient->therapist ? $patient->therapist : null;
                    @endphp

                    <div class="m-4 text-xl text-black">
                        <b>Hola {{ $patient->nombres ?? 'Paciente' }}.</b><br>
                    </div>

                    @if ($therapist)
                        <div class="m-4 text-lg text-gray-800">
                            <span>Usted es un paciente de {{$therapist->name ?? 'Terapeuta'}} y puede ver sus actividades designadas.</span>
                        </div>
                    @else
                        <div class="m-4 text-lg text-gray-600">
                            Por el momento, no tienes terapeuta asignado.
                        </div>
                    @endif

                    @if ($activities->isEmpty())
                        <p class="text-gray-600 m-4">Por el momento no tienes actividades asignadas.</p>
                    @else
                        <div class="m-4">
                            <h2 class="text-lg font-bold mb-4">Actividades:</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($activities as $activity)
                                    <div class="bg-[#F2EBDC] border border-[#03658C] rounded-xl shadow-md p-4 hover:shadow-lg transition duration-300">
                                        <h3 class="text-xl font-bold text-[#03658C] mb-2">
                                            {{ $activity->description ?? 'Sin título' }}
                                        </h3>
                                        <p class="text-gray-700 text-sm mb-3">
                                            {{ $activity->reasons ?? 'Sin descripción' }}
                                        </p>
                                        <span class="inline-block bg-[#7EB0F2] text-white px-3 py-1 rounded-full text-xs">
                                            Actividad asignada
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endrole


            </div>
        </div>
    </div>
</x-app-layout>