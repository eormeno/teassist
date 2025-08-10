<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>TEASSIST</title>
        @vite('resources/css/landing.css')
    </head>

    <body class="font-sans bg-white text-[#03658C]">
        <!-- Header -->
        <header class="bg-[#F2EBDC] py-6 shadow-lg">
            <div class="container mx-auto flex justify-between items-center px-3 relative">
                <img src="{{ asset('images/autis3.jpeg') }}" class="w-50 h-20 float-start" alt="logo" />
                <h1 class="absolute left-1/2 transform -translate-x-1/2 text-4xl font-extrabold text-[#03658C]">TEASSIST</h1>
                @if (Route::has('login'))
                    <nav class="flex flex-wrap justify-between items-center space-y-4 lg:space-y-0 lg:space-x-3">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-extrabold bg-[#03658C] text-[#F2EBDC] rounded-md px-5 py-3 transition hover:bg-[#7EB0F2] shadow-md">
                                Panel
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-extrabold bg-[#03658C] text-[#F2EBDC] rounded-md px-3 py-3 transition hover:bg-[#7EB0F2] shadow-md">
                                Ingresar
                            </a>
                            <a href="{{ route('patient.login') }}"
                                class="font-extrabold bg-[#03658C] text-[#F2EBDC] rounded-md px-3 py-3 transition hover:bg-[#03658C] shadow-md">
                                Ingresar como paciente
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="font-extrabold bg-[#03658C] text-[#F2EBDC] rounded-md px-3 py-3 transition hover:bg-[#F25430] hover:text-white shadow-md">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <!-- Sección de información sobre el Trastorno del Espectro Autista -->
        <div class="relative flex justify-center items-center">
            <!-- Imagen de fondo -->
            <img src="{{ asset('images/autis3.jpeg') }}" style="height:60%; width:30%;" class="absolute opacity-20" alt="Imagen de fondo" />

            <!-- Sección con contenido superpuesto -->
            <section
                class="relative max-w-4xl mx-auto p-6 my-12 bg-[#F2B749] bg-opacity-90 shadow-md rounded-lg z-10 text-[#03658C]">
                <h1 class="text-3xl font-extrabold text-center text-[#03658C]">Trastorno del Espectro Autista (TEA)</h1>
                <p class="font-bold mt-6 text-lg leading-relaxed">
                    El Trastorno del Espectro Autista (TEA) es una condición neurobiológica que afecta la comunicación,
                    la interacción social y el comportamiento. El espectro es amplio, lo que significa que las personas
                    con TEA pueden tener una variedad de habilidades y desafíos, desde dificultades leves hasta necesidades
                    de apoyo significativas. Algunas características incluyen la dificultad para entender señales sociales,
                    comportamientos repetitivos, y un enfoque intenso en intereses específicos.
                </p>
                <p class="font-bold mt-4 text-lg leading-relaxed">
                    Aunque las personas con TEA enfrentan desafíos, muchas de ellas desarrollan estrategias para vivir de
                    manera independiente y alcanzar sus objetivos con el apoyo adecuado. La intervención temprana, las
                    terapias personalizadas y el apoyo de la comunidad son fundamentales para mejorar la calidad de vida de
                    quienes viven con TEA.
                </p>
            </section>
        </div>

        <!-- Sección de enlace a APADEA -->
        <div class="relative flex justify-center items-center">
            <!-- Imagen de fondo -->
            <img src="{{ asset('images/autis3.jpeg') }}" style="height:60%; width:30%;" class="absolute opacity-20" alt="Imagen de fondo" />
            <!-- Sección con contenido superpuesto -->
            <section
                class="relative max-w-4xl mx-auto p-6 my-12 bg-[#7EB0F2] bg-opacity-90 shadow-md rounded-lg z-10 text-[#F2EBDC]">
                <h2 class="text-2xl font-extrabold text-center text-[#F2EBDC]">Conoce más sobre APADEA</h2>
                <p class="font-bold mt-4 text-lg text-center">
                    APADEA es la Asociación Argentina de Padres de Autistas, una organización dedicada a brindar apoyo,
                    orientación y recursos a las familias de personas con Trastorno del Espectro Autista en Argentina.
                </p>
                <div class="text-center mt-6">
                    <a href="https://apadea.org.ar/" target="_blank"
                        class="text-white bg-[#03658C] hover:bg-[#7EB0F2] font-bold py-3 px-6 rounded-lg transition-colors">
                        Visita el sitio web de APADEA
                    </a>
                </div>
            </section>
        </div>

        <div class="relative flex justify-center items-center">
            <!-- Imagen de fondo -->
            <img src="{{ asset('images/autis3.jpeg') }}" style="height:60%; width:30%;" class="absolute opacity-20" alt="Imagen de fondo" />

            <!-- Sección con contenido superpuesto -->
            <section
                class="relative max-w-4xl mx-auto p-6 my-12 bg-[#F2B749] bg-opacity-90 shadow-md rounded-lg z-10 text-[#03658C]">
                <h2 class="text-2xl font-extrabold text-center text-[#03658C]">Preguntas Frecuentes sobre el Espectro Autista</h2>
                <div class="mt-6">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-white">¿Qué es el Trastorno del Espectro Autista (TEA)?</h3>
                        <p class="font-bold mt-2 text-lg">
                            El TEA es una condición del desarrollo que afecta cómo las personas perciben y socializan con
                            otros, lo que provoca problemas en la interacción social y la comunicación. También incluye
                            comportamientos repetitivos.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-white">¿Qué tan común es el TEA?</h3>
                        <p class="font-bold mt-2 text-lg">
                            Se estima que 1 de cada 54 niños es diagnosticado con TEA, lo que lo convierte en uno de los
                            trastornos de desarrollo más comunes.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-white">¿Existen tratamientos para el TEA?</h3>
                        <p class="font-bold mt-2 text-lg">
                            Si bien no existe una cura para el TEA, las terapias conductuales, ocupacionales, del habla y
                            otras intervenciones pueden ayudar a mejorar las habilidades y el desarrollo de una persona.
                        </p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-white">¿El TEA afecta solo a los niños?</h3>
                        <p class="font-bold mt-2 text-lg">
                            No, el TEA es una condición de por vida. Si bien el diagnóstico generalmente ocurre en la infancia,
                            muchas personas con TEA continúan enfrentando desafíos durante la adolescencia y la edad adulta.
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="text-[#03658C] py-6 mt-12 shadow-xl bg-[#F2EBDC]">
            <div class="container mx-auto text-center font-extrabold">
                <p>&copy; 2024 Software para Personas con Diagnóstico de Autismo. Todos los derechos reservados. Emanuel
                    Pintor.</p>
            </div>
        </footer>
    </body>

</html>
