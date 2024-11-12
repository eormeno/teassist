<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEAssist</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="font-sans bg-gray-100">
    <header class="bg-white text-white py-4 flex items-center">
        <img src="{{ asset('images/logo.jpg') }}" alt="logotipo"
             class="rounded-lg h-2/5 w-1/4  mx-4 px-2">
        @if (Route::has('login'))
            <nav class="flex flex-grow mx-3">
                @auth
                    <div class="mx-3 h-2/4">
                        <a href="{{ route('landing') }}"
                           class="mx-3 rounded-md px-3 py-2 border-2 border-rojologo text-rojologo text-lg font-semibold inline-block text-center hover:border-rojologo/60 hover:text-rojologo/60 focus:outline-none">Inicio</a>
                        <a href="#quienes"
                           class="mx-3 rounded-md px-3 py-2 border-2 border-rojologo text-rojologo text-lg font-semibold inline-block text-center hover:border-rojologo/60 hover:text-rojologo/60 focus:outline-none">Quienes Somos</a>
                        <a href="#equipo"
                           class="mx-3 rounded-md px-3 py-2 border-2 border-rojologo text-rojologo text-lg font-semibold inline-block text-center hover:border-rojologo/60 hover:text-rojologo/60 focus:outline-none">Equipo</a>
                        <a href="#contacto"
                           class="mx-3 rounded-md px-3 py-2 border-2 border-rojologo text-rojologo text-lg font-semibold inline-block text-center hover:border-rojologo/60 hover:text-rojologo/60 focus:outline-none">Contacto</a>
                    </div>
                    <div class="ml-auto h-2/4">
                    <a href="{{ url('/dashboard') }}"
                       class="mx-2 px-2 py-2 bg-azullogo border-2 border-blue text-white text-lg font-semibold rounded-md inline-block text-center hover:border-white/70 hover:text-white hover:bg-azullogo/60 focus:outline-none">Panel</a>
                    </div>
                @else
                    <div class="mx-3 h-2/4">
                        <a href="{{ route('landing') }}"
                           class="mx-3 rounded-md px-3 py-2 border-2 border-rojologo text-rojologo text-lg font-semibold inline-block text-center hover:border-rojologo/60 hover:text-rojologo/60 focus:outline-none">Inicio</a>
                        <a href="#quienes"
                           class="mx-3 rounded-md px-3 py-2 border-2 border-rojologo text-rojologo text-lg font-semibold inline-block text-center hover:border-rojologo/60 hover:text-rojologo/60 focus:outline-none">Quienes Somos</a>
                        <a href="#equipo"
                           class="mx-3 rounded-md px-3 py-2 border-2 border-rojologo text-rojologo text-lg font-semibold inline-block text-center hover:border-rojologo/60 hover:text-rojologo/60 focus:outline-none">Equipo</a>
                        <a href="#contacto"
                           class="mx-3 rounded-md px-3 py-2 border-2 border-rojologo text-rojologo text-lg font-semibold inline-block text-center hover:border-rojologo/60 hover:text-rojologo/60 focus:outline-none">Contacto</a>
                    </div>
                    <div class="ml-auto h-2/4">
                    <a href="{{ route('login') }}"
                       class="mx-2 px-2 py-2 bg-azullogo border-2 border-blue text-white text-lg font-semibold rounded-md inline-block text-center hover:border-white/70 hover:text-white hover:bg-azullogo/60 focus:outline-none">Ingresar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="mx-2 px-2 py-2 bg-azullogo border-2 border-blue text-white text-lg font-semibold rounded-md inline-block text-center hover:border-white/70 hover:text-white hover:bg-azullogo/60 focus:outline-none">
                            Registrarse
                        </a>
                    </div>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
</body>


    <main class="container mx-auto px-4 py-8">
        <section class="container mx-auto my-10">
            <div id="carousel" class="relative h-[580px] overflow-hidden">
                <!-- Carrusel de Imagenes -->
                <div class="carousel-inner">
                    <!-- Imagen 1 -->
                    <div class="carousel-item absolute inset-0 transition-opacity duration-500 opacity-100 flex flex-col items-center justify-center">
                        <img src="{{ asset('images/image_1.png') }}" class="w-full h-full object-cover" alt="imagen1">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center flex-col text-white p-5">
                                <h2 class="text-5xl font-bold">¿Qué es TEA?</h2>
                                <p class="mt-4 w-4/6 text-2xl text-center">El trastorno del espectro autista (TEA) es un tipo de trastorno del desarrollo. A menudo aparece en los primeros 2 a 3 años de la vida. El TEA afecta la habilidad del cerebro para desarrollar las habilidades sociales y de comunicación normales.</p>
                        </div>
                    </div>
                    <!-- Imagen 2 -->
                    <div class="carousel-item absolute inset-0 transition-opacity duration-500 opacity-100 flex flex-col items-center justify-center">
                        <img src="{{ asset('images/image_2.png') }}" class="w-full h-full object-cover" alt="imagen2">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center flex-col text-white p-5">
                            <h2 class="text-5xl font-bold">Causas</h2>
                            <p class="mt-4 w-4/6 text-2xl text-center">La causa exacta del TEA se desconoce. Es probable que exista una serie de factores que pueden llevar a que se presente el TEA. Las investigaciones muestran que los genes pueden participar, ya que el TEA se da en algunas familias. Ciertos medicamentos tomados durante el embarazo también pueden llevar a que el niño presente TEA.</p>
                        </div>
                    </div>
                    <!-- Imagen 3 -->
                    <div class="carousel-item absolute inset-0 transition-opacity duration-500 opacity-100 flex flex-col items-center justify-center">
                        <img src="{{ asset('images/image_3.png') }}" class="w-full h-full object-cover" alt="imagen3">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center flex-col text-white p-5">
                            <h2 class="text-5xl font-bold">Síntomas</h2>
                            <p class="mt-4 w-4/6 text-2xl text-center">La mayoría de los padres de niños con TEA sospechan que algo no está bien cuando el niño tiene 18 meses. Los niños con TEA a menudo tienen problemas con Juegos actuados,
                                interacciones sociales, comunicación verbal y no verbal, entre otros.</p>
                        </div>
                    </div>
                </div>

                <!-- Botones de Navegación -->
                <button id="prev" class="absolute left-0 z-10 p-4 bg-gray-800 text-white rounded-full transform -translate-y-1/2 top-1/2 text-3xl">⟨</button>
                <button id="next" class="absolute right-0 z-10 p-4 bg-gray-800 text-white rounded-full transform -translate-y-1/2 top-1/2 text-3xl">⟩</button>
            </div>
        </section>
        <br><br>
        <div class="separador"></div>
        <br><br>
        <section id="quienes" class="mb-12">
            <br>
            <h2 class="text-5xl font-bold mb-4 text-rojologo text-center">¿Quienes somos?</h2>
            <p class="mb-4 text-3xl text-center">TEApp es una plataforma médica dedicada a la investigación y tratamiento del TEA, conformada por un equipo multidisciplinario comprometido con la mejora continua de la calidad de vida de nuestros pacientes."</p>
            <br>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 justify-items-center">
                <div class="bg-white text-white rounded-lg shadow-lg mb-3 max-w-xs border-rojologo border-2">
                    <div class="bg-rojologo p-4 font-semibold h-2/6">
                        <h5 class="text-lg font-bold mb-2 text-white text-center">Nuestro Objetivo con los Pacientes:</h5></div>
                    <div class="p-4">
                        <p class="text-rojologo text-sm">Ofrecer un entorno especializado para el desarrollo integral de personas con Trastorno del Espectro Autista. Acompañar y guiar a cada paciente y su familia en su camino hacia un desarrollo óptimo, brindando atención personalizada basada en evidencia científica.</p>
                    </div>
                </div>
                <div class="bg-white text-white rounded-lg shadow-lg mb-3 max-w-xs border-rojologo border-2">
                    <div class="bg-rojologo px-2 py-2 font-semibold h-2/6">
                        <h5 class="text-lg font-bold text-white text-center">Compromiso con la Excelencia Médica:</h5></div>
                    <div class="p-4">
                        <p class="text-rojologo text-sm">Nos comprometemos a proporcionar un servicio médico de calidad, guiado por profesionales altamente capacitados y un ambiente de respeto y empatía.</p>
                    </div>
                </div>
                <div class="bg-white text-white rounded-lg shadow-lg mb-3 max-w-xs border-rojologo border-2">
                    <div class="bg-rojologo p-4 font-semibold h-2/6">
                        <h5 class="text-lg font-bold mb-2 text-white text-center">Atención Integral y Monitoreo:</h5></div>
                    <div class="p-4">
                        <p class="text-rojologo text-sm">Ofrecemos una plataforma donde los especialistas pueden monitorear el progreso terapéutico, asegurando intervenciones precisas y adaptadas a cada necesidad.</p>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
        <div class="separador"></div>
        <br><br>
        <section id="equipo" class="mb-12">
            <div class="py-12">
                <div class="container mx-auto text-center">
                    <!-- Título de la sección -->
                    <h2 class="text-5xl font-bold mb-8 text-azullogo">Nuestro Equipo</h2>

                    <!-- Contenedor de la cuadrícula de tarjetas -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Tarjeta de miembro del equipo -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden border-azullogo border-2">
                            <img src="{{ asset('images/image_4.jpg') }}" alt="Foto de miembro del equipo" class="w-64 h-64 rounded-full mt-6 mx-auto object-cover">
                            <div class="p-6 bg-white ">
                                <h3 class="text-2xl text-azullogo font-semibold">Manuela Viollier Capelli</h3>
                                <p class="text-gray-600">Psicóloga Clínica Adolescentes y Adultos</p>
                            </div>
                        </div>

                        <!-- Repite las tarjetas para cada miembro del equipo -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden border-azullogo border-2">
                            <img src="{{ asset('images/image_5.jpg') }}" alt="Foto de miembro del equipo" class="w-64 h-64 rounded-full mt-6 mx-auto object-cover">
                            <div class="p-6 bg-white">
                                <h3 class="text-2xl text-azullogo font-semibold">Antonia Muñoz Muñoz</h3>
                                <p class="text-gray-600">Terapeuta Ocupacional, Licenciada en Ciencias de la Ocupación </p>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-lg overflow-hidden border-azullogo border-2">
                            <img src="{{ asset('images/image_6.jpg') }}" alt="Foto de miembro del equipo" class="w-64 h-64 rounded-full mt-6 mx-auto object-cover">
                            <div class="p-6 bg-white">
                                <h3 class="text-2xl text-azullogo font-semibold">Paula Armas Espinosa</h3>
                                <p class="text-gray-600">Trabajadora Social y Mediadora Familiar</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <br><br>
        <div class="separador"></div>
        <br><br>
        <br><br>
        <section id="contacto" class="bg-blue-100 p-6 rounded-lg">
            <h2 class="text-2xl font-semibold mb-4">Contáctenos</h2>
            <p>Para más información sobre nuestro software o para solicitar una demostración, por favor contáctenos:</p>
            <a href="mailto:info@autismosoftware.com" class="text-blue-600 hover:underline">info@autismosoftware.com</a>
        </section>
    </main>

    <footer class="bg-rojologo text-white py-4 mt-12 font-semibold text-lg">
        <div class="container mx-auto px-4 text-center">
            <p> &copy; 2024 Software para Personas con Diagnóstico de Autismo. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
