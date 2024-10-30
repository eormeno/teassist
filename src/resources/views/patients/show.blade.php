<x-crud-layout>
    <x-slot name="title">Detalles del Paciente</x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mt-4">
        <h1 class="text-2xl font-bold text-[#1E1E49] mb-6">{{ $title }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold text-[#0075B2] mb-4">Información Personal</h2>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <span class="text-[#042940] font-medium w-40">Código:</span>
                        <span class="text-gray-700">{{ $patient->codigo }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-[#042940] font-medium w-40">Apellidos:</span>
                        <span class="text-gray-700">{{ $patient->apellidos }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-[#042940] font-medium w-40">Nombres:</span>
                        <span class="text-gray-700">{{ $patient->nombres }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-[#042940] font-medium w-40">DNI:</span>
                        <span class="text-gray-700">{{ $patient->dni }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-[#042940] font-medium w-40">Fecha de nacimiento:</span>
                        <span class="text-gray-700">{{ $patient->nacimiento }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-[#042940] font-medium w-40">Sexo:</span>
                        <span class="text-gray-700">{{ $patient->sexo }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold text-[#0075B2] mb-4">Información de Contacto</h2>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <span class="text-[#042940] font-medium w-40">Teléfono:</span>
                        <span class="text-gray-700">{{ $patient->telefono }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-[#042940] font-medium w-40">Email:</span>
                        <span class="text-gray-700">{{ $patient->email }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-[#042940] font-medium w-40">Dirección:</span>
                        <span class="text-gray-700">{{ $patient->direccion }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg shadow-sm mb-6">
            <h2 class="text-lg font-semibold text-[#0075B2] mb-4">Observaciones</h2>
            <p class="text-gray-700 whitespace-pre-line">{{ $patient->observaciones }}</p>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('patients.index') }}"
               class="inline-flex items-center bg-[#0075B2] text-white px-4 py-2 rounded hover:bg-[#005C53] transition duration-200 no-underline">
                <i class="fa-solid fa-arrow-left mr-2"></i>
                Volver
            </a>
        </div>
    </div>

    <style>
        .max-w-7xl {
            max-width: 80rem;
        }

        @media (max-width: 768px) {
            .flex.items-start {
                flex-direction: column;
            }

            .flex.items-start .w-40 {
                width: 100%;
                margin-bottom: 0.25rem;
            }
        }

        /* Estilos adicionales para mejorar la apariencia */
        h2 {
            border-bottom: 2px solid #0075B2; /* Línea debajo del título */
            padding-bottom: 4px; /* Espaciado debajo del título */
        }

        .bg-gray-50 {
            border-left: 4px solid #0075B2; /* Línea izquierda para destacar la sección */
        }

        .flex.justify-end a {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra en el botón */
        }

        .flex.justify-end a:hover {
            transform: translateY(-2px); /* Efecto de elevación al pasar el mouse */
        }
    </style>
</x-crud-layout>

