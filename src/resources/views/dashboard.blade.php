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
            </div>
        </div>
    </div>
</x-app-layout>