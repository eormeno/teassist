<x-event-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <div class="py-4">
        <div class="w-full mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-full">
                <div class="p-6 sm:px-4 bg-white border-b border-gray-200">
                    {{ $slot }}
                    @if (isset($links))
                        <div class="mt-4">
                            {{ $links }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Estilos globales --}}
    <style>
        /* Contenedor principal */
        .max-w-7xl {
            max-width: 80rem;
        }

        /* Estilos comunes para botones */
        .action-btn,
        .delete-btn,
        .x-button {
            transition: all 0.2s ease-in-out;
        }

        .action-btn:hover,
        .delete-btn:hover,
        .x-button:hover {
            transform: scale(1.05);
        }

        /* Estilos para botones específicos */
        .x-button {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: 500;
            text-align: center;
            width: 6rem;
        }

        .form-select {
            border-color: #0075b2;
            --tw-ring-color: #0075b2;
            font-size: 0.875rem;
            line-height: 1.25rem;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
        }

        .btn-primary {
            background-color: #0075b2;
            border-color: #0075b2;
            color: white;
            font-weight: 500;
            font-size: 0.875rem;
            line-height: 1.25rem;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #005f8c;
            border-color: #005f8c;
        }

        .btn-secondary {
            background-color: transparent;
            border: 2px solid #0075b2;
            color: #0075b2;
            font-weight: 600;
            font-size: 0.875rem;
            line-height: 1.25rem;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        .btn-secondary:hover {
            background-color: rgba(0, 117, 178, 0.1);
        }

        /* styles.css */
        .label-custom-blue {
            color: #1e1e49;
            font-size: 1.1rem;
            /* equivale a Tailwind text-lg */
            font-weight: 600;
        }

        /* Estilos para formularios */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }


        .nav-link {
            color: #1e1e49;
            font-weight: 500;
            font-size: 1.125rem;
            /* Tailwind text-lg equivalente */
            padding: 1rem;
            border-radius: 0.375rem;
            transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        .nav-link:hover {
            color: #D6D58E;
            background-color: #f3f4f6;
            /* Tailwind gray-100 equivalente */
        }

        .nav-link.active {
            border-bottom: 4px solid #1e1e49;
        }

        .input-bg-white {
            background-color: white !important;
            /* Otros estilos opcionales */
            border: 1px solid #d1d5db;
            /* Gris claro */
            padding: 0.5rem;
            border-radius: 0.25rem;
            color: black;
        }


        @media (min-width: 768px) {
            .form-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 1rem;
            }



        }
    </style>
</x-event-layout>
