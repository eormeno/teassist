x<x-event-layout>
    <x-slot name="title">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contador') }}
        </h2>
    </x-slot>

    <div class="font-sans antialiased  dark:text-white">
        <div class="container mx-auto px-4 py-8">            
            <div class="flex flex-col space-y-4">
                <span class="text-5xl font-bold m-3">{{ $número }}</span> <!-- Mostrar el número -->
                <br>

                <!-- Botón para incrementar -->
                <x-button class="bg-green-500  hover:bg-green-500 m-3 w-32"
                    onclick="location.href='{{ route('incrementar', ['número' => $número]) }}'">
                    Incrementar
                </x-button>

                <!-- Botón para decrementar -->
                <x-button class="bg-red-500 hover:bg-red-500 m-3 w-32"
                    onclick="location.href='{{ route('decrementar', ['número' => $número]) }}'">
                    Decrementar
                </x-button>

                <!-- Boton para duplicar -->
                <x-button class="bg-red-500 hover:bg-red-300 m-3 w-32"
                    onclick="location.href='{{route('duplicar',['número'=>$número]) }}'">
                    Duplicar
                </x-button>

                <!-- Boton para resetear -->
                <x-button class="bg-yellow-500 hover:bg-yellow-500 m-3 w-32"
                    onclick="location.href='{{route('resetear')}}'">
                    Resetear
                </x-button>

                <!-- Formulario para enviar el número ingresado -->
                <form action="{{ route('reestablecer') }}" method="POST" class="flex flex-col ">
                    @csrf
                
                    <!-- Contenedor para alinear el input y el botón en una fila -->
                    <div class="flex items-center">
                        <!-- Botón para enviar el formulario -->
                        <x-button class="bg-blue-500 hover:bg-blue-500 ml-3 mr-5 w-32" type="submit">
                            Reestablecer
                        </x-button>
                        <!-- Campo para ingresar el número -->
                        <input class="bg-gray-500 text-white font-bold  rounded cursor-pointer h-8 w-27 ml-3 text-center" type="number" id="numero" name="numero" min="0" max="9" required>
                
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
    
    
</x-event-layout>