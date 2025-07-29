<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg text-black dark:text-white">
                @role('registered')
                    <div class="m-4 text-xl text-gray-600 dark:text-gray-200">
                        <b>Usted está registrado en el sistema.</b> Para poder acceder a funcionalidades
                         específicas, debe dirigirse personalmente al área de administración de la
                         organización.
                    </div>
                @else
                    @role('root')
                        <div class="m-4 text-xl text-gray-600 dark:text-gray-200">
                            <b>Bienvenido.</b><br><b>Usted es usuario raíz.</b> Puede acceder a todas las funcionalidades del sistema.
                        </div>
                @else
                    <p class="m-4 text-xl text-gray-600 dark:text-gray-200"><b>Bienvenido.</b>
                    <br>Usted tiene las funciones de:</p>
                    @can('roles-list')
                    <div class="m-4 text-xl text-gray-600 dark:text-gray-200">
                        <li>Ver todos los roles del sistema.</li>
                    </div>
                    @endcan

                    @can('users-list')
                    <div class="m-4 text-xl text-gray-600 dark:text-gray-200">
                         <li>Ver todos los usuarios del sistema.</li>
                    </div>
                    @endcan

                    @can('patients-list')
                    <div class="m-4 text-xl text-gray-600 dark:text-gray-200">
                        <li>Ver todos sus Pacientes del sistema.</li>
                    </div>
                    @endcan
                    @endrole
                @endrole
            </div>
        </div>
    </div>
</x-app-layout>
