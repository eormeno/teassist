<x-crud-layout>
    <x-slot name="title">Detalle de la actividad</x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mt-4">
        <h1 class="text-2xl font-bold text-[#1E1E49] mb-6">{{ $activity->name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold text-[#0075B2] mb-4">Descripción</h2>
                <p class="text-gray-700 whitespace-pre-line">{{ $activity->description }}</p>
            </div>

            <div class="bg-gray-50 p-6 rounded-lg shadow-sm flex justify-center items-center">
                <img src="data:image/png;base64,{{ $activity->image }}" alt="Imagen de la actividad" class="rounded-md" width="255">
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('activities.index') }}"
               class="inline-flex items-center bg-[#0075B2] text-white px-4 py-2 rounded hover:bg-[#005C53] transition duration-200 no-underline">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
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

