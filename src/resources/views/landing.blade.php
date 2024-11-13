<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEAssist</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                <button id="prev" class="absolute left-0 z-10 p-4 ml-2 bg-rojologo text-white rounded-full transform -translate-y-1/2 top-1/2 text-3xl">⟨</button>
                <button id="next" class="absolute right-0 z-10 p-4 mr-2 bg-rojologo text-white rounded-full transform -translate-y-1/2 top-1/2 text-3xl">⟩</button>
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
                <div data-aos="fade-right" data-aos-duration="1500" class="bg-white text-white rounded-lg shadow-lg mb-3 max-w-xs border-rojologo border-2">
                    <div class="bg-rojologo p-4 font-semibold h-2/6">
                        <h5 class="text-lg font-bold mb-2 text-white text-center">Nuestro Objetivo con los Pacientes:</h5></div>
                    <div class="p-4">
                        <p class="text-rojologo text-sm">Ofrecer un entorno especializado para el desarrollo integral de personas con Trastorno del Espectro Autista. Acompañar y guiar a cada paciente y su familia en su camino hacia un desarrollo óptimo, brindando atención personalizada basada en evidencia científica.</p>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1500" class="bg-white text-white rounded-lg shadow-lg mb-3 max-w-xs border-rojologo border-2">
                    <div class="bg-rojologo px-2 py-2 font-semibold h-2/6">
                        <h5 class="text-lg font-bold text-white text-center">Compromiso con la Excelencia Médica:</h5></div>
                    <div class="p-4">
                        <p class="text-rojologo text-sm">Nos comprometemos a proporcionar un servicio médico de calidad, guiado por profesionales altamente capacitados y un ambiente de respeto y empatía.</p>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="1500" class="bg-white text-white rounded-lg shadow-lg mb-3 max-w-xs border-rojologo border-2">
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
                        <div data-aos="flip-right" data-aos-duration="1500" class="bg-white rounded-lg shadow-lg overflow-hidden border-azullogo border-2">
                            <img src="{{ asset('images/image_4.jpg') }}" alt="Foto de miembro del equipo" class="w-64 h-64 rounded-full mt-6 mx-auto object-cover">
                            <div class="p-6 bg-white ">
                                <h3 class="text-2xl text-azullogo font-semibold">Manuela Viollier Capelli</h3>
                                <p class="text-gray-600">Psicóloga Clínica Adolescentes y Adultos</p>
                            </div>
                        </div>

                        <!-- Repite las tarjetas para cada miembro del equipo -->
                        <div data-aos="flip-right" data-aos-duration="1500"  class="bg-white rounded-lg shadow-lg overflow-hidden border-azullogo border-2">
                            <img src="{{ asset('images/image_5.jpg') }}" alt="Foto de miembro del equipo" class="w-64 h-64 rounded-full mt-6 mx-auto object-cover">
                            <div class="p-6 bg-white">
                                <h3 class="text-2xl text-azullogo font-semibold">Antonia Muñoz Muñoz</h3>
                                <p class="text-gray-600">Terapeuta Ocupacional, Licenciada en Ciencias de la Ocupación </p>
                            </div>
                        </div>

                        <div data-aos="flip-right" data-aos-duration="1500"  class="bg-white rounded-lg shadow-lg overflow-hidden border-azullogo border-2">
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
        <section class="bg-blue-100 p-6 rounded-lg container mx-auto text-center">
            <h2 class="text-5xl font-bold mb-8 text-rojologo">Contáctenos</h2>
            <div>
            <div class="mt-5" >
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8" >
                    <div data-aos="zoom-in" data-aos-duration="1500" >
                        <iframe width="100%" height="315" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3400.6502529463737!2d-68.53506192537317!3d-31.533764574207748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9681402c26c01aed%3A0xe6b427d29d778da7!2sSanatorio%20Argentino%20Sede%201!5e0!3m2!1ses-419!2sar!4v1731486256715!5m2!1ses-419!2sar" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div data-aos="zoom-in" data-aos-duration="1500"  class="text-justify">
                        <p class="text-3xl">Nuestros medios de Contacto:</p>
                        <br>
                        <p class="text-2xl">Teléfono: 264-527-3044</p>
                        <br>
                        <p class="text-2xl">WhatsApp: 264-556-7857</p>
                        <br>
                        <p class="text-2xl">Correo Electronico:
                            <a href="mailto:info@autismosoftware.com"
                            class="text-rojologo hover:underline">info@teassist.com
                            </a>
                        </p>
                        <br>
                        <p class="text-2xl">Facebook:
                            <a href="facebook.com"
                            class="text-rojologo hover:underline">TeassistSJ
                            </a>
                        </p>
                        <br>
                        <p class="text-2xl">Instagram:
                            <a href="instagram.com"
                            class="text-rojologo hover:underline">Teassist.SJ
                            </a>
                        </p>
                    </div>
                </div>
            </div>
    </div><br><br><br>
        </section>
    </main>

    <footer class="bg-rojologo text-white py-4 mt-12 font-semibold text-lg">
        <div class="container mx-auto px-4 text-center">
            <p> &copy; 2024 Software para Personas con Diagnóstico de Autismo. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
