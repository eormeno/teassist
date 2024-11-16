<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trastorno del Espectro Autista</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css">
    @vite('resources/css/app.css')
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .slider-container {
            margin-top: -1px; /* Ajusta este valor si es necesario */
        }
        .tns-nav {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
        }
        .card-flip {
            perspective: 1000px;
        }
        .card-inner {
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }
        .card-flip:hover .card-inner {
            transform: rotateY(180deg);
        }
        .card-front, .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .card-back {
            transform: rotateY(180deg);
        }
        .card-overlay {
            background: rgba(0, 0, 0, 0.5);
        }
        .menu-transition {
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="font-sans bg-gray-100">
    <header class="bg-white shadow-md w-full">
        <nav class="max-w-6xl mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <img src="{{ asset('images/TeAssist(1).png') }}" alt="TeAssist Logo" class="w-1/10 h-1/10 object-contain lg:order-1">
                <div class="lg:hidden">
                    <button id="menu-toggle" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                            <path class="hidden" fill-rule="evenodd" clip-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:items-center lg:justify-between lg:w-full lg:order-2">
                    <div class="flex-1"></div>
                    <div class="flex items-center space-x-8">
                        <a href="{{ route('index')}}" class="text-gray-700 text-lg">Home</a>
                        <a href="{{ route('index.tea')}}" class="text-[#4172A9] text-lg font-bold">Infórmate</a>
                        <a href="{{ route('index.nosotros')}}" class="text-gray-700 text-lg">Nosotros</a>
                    </div>
                    <div class="flex-1 flex justify-end space-x-4">
                        <x-button onclick="location.href='{{ route('index.login')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Iniciar Sesión</x-button>
                        <x-button onclick="location.href='{{ route('index.login')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Registrarse</x-button>
                    </div>
                </div>
            </div>
            <div id="mobile-menu" class="hidden lg:hidden mt-4 space-y-4 menu-transition max-h-0 opacity-0 transform translate-y-[-10px] overflow-hidden">
                <div class="flex flex-col items-center space-y-4">
                    <a href="{{ route('index')}}" class="text-gray-700 text-lg">Home</a>
                    <a href="{{ route('index.tea')}}" class="text-[#4172A9] text-lg font-bold">Infórmate</a>
                    <a href="{{ route('index.nosotros')}}" class="text-gray-700 text-lg">Nosotros</a>
                        <x-button onclick="location.href='{{ route('index.login')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Iniciar Sesión</x-button>
                        <x-button onclick="location.href='{{ route('index.login')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Registrarse</x-button>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-grow">
        <section class="slider-container">
            <div class="slider">
                <img src="{{ asset('images/libro2.webp') }}" alt="Persona leyendo" class="w-full h-auto">
                <img src="{{ asset('images/music.png') }}" alt="Niño jugando" class="w-full h-auto">
                <img src="{{ asset('images/aire.png') }}" alt="Familia junta" class="w-full h-auto">
            </div>
        </section>

        <section class="mb-12 text-center max-w-6xl mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold mb-4">¿Qué es el Trastorno de Espectro Autista?</h1>
            <p class="text-lg mb-6">El Trastorno del Espectro Autista (TEA) es una condición caracterizada por presentar variables alteraciones con un impacto de por vida. Estas manifestaciones son muy variables entre individuos y a través del tiempo, acorde al crecimiento y maduración de las personas. Las personas con diagnóstico de autismo presentan características únicas que pueden variar en gravedad y expresión.</p>
            <br>
            <h2 class="text-3xl font-bold mb-4">Caracteriasticas de las personas con TEA</h2>
        </section>
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto px-4 py-8">
            <div class="card-flip">
                <div class="card-inner relative w-full h-64">
                    <div class="card-front bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{asset('images/comunicacion.png') }}')">
                        <div class="card-overlay absolute inset-0 flex items-end p-4">
                            <h3 class="text-xl font-semibold text-white">Dificultades en la comunicación</h3>
                        </div>
                    </div>
                    <div class="card-back bg-[#A0A8FF] text-white rounded-lg shadow-md p-4 flex items-center justify-center">
                        <p>Pueden tener dificultades para iniciar conversaciones, mantener el contacto visual y comprender el tono y el contexto de la comunicación.</p>
                    </div>
                </div>
            </div>
            <div class="card-flip">
                <div class="card-inner relative w-full h-64">
                    <div class="card-front bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{asset('images/planta2.png') }}')">
                        <div class="card-overlay absolute inset-0 flex items-end p-4">
                            <h3 class="text-xl font-semibold text-white">Dificultades en las interacciones sociales</h3>
                        </div>
                    </div>
                    <div class="card-back bg-[#4172A9] text-white rounded-lg shadow-md p-4 flex items-center justify-center">
                        <p>Presentan problemas para interactuar con los demás, entender las normas sociales y desarrollar relaciones significativas. Pueden parecer distantes o aislados.</p>
                    </div>
                </div>
            </div>
            <div class="card-flip">
                <div class="card-inner relative w-full h-64">
                    <div class="card-front bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{asset('images/repeticion.png') }}')">
                        <div class="card-overlay absolute inset-0 flex items-end p-4">
                            <h3 class="text-xl font-semibold text-white">Repetición de comportamientos</h3>
                        </div>
                    </div>
                    <div class="card-back bg-[#FFA07A] text-white rounded-lg shadow-md p-4 flex items-center justify-center">
                        <p>Presentan comportamientos repetitivos, como movimientos corporales estereotipados o rituales específicos.</p>
                    </div>
                </div>
            </div>
            <div class="card-flip">
                <div class="card-inner relative w-full h-64">
                    <div class="card-front bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{asset('images/sonido.png') }}')">
                        <div class="card-overlay absolute inset-0 flex items-end p-4">
                            <h3 class="text-xl font-semibold text-white">Sensibilidad sensorial</h3>
                        </div>
                    </div>
                    <div class="card-back bg-[#20B2AA] text-white rounded-lg shadow-md p-4 flex items-center justify-center">
                        <p>Las personas con autismo pueden ser muy sensibles a los estímulos sensoriales, como la luz, el sonido o el tacto.</p>
                    </div>
                </div>
            </div>
            <div class="card-flip">
                <div class="card-inner relative w-full h-64">
                    <div class="card-front bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{asset('images/rutina.png') }}')">
                        <div class="card-overlay absolute inset-0 flex items-end p-4">
                            <h3 class="text-xl font-semibold text-white">Adherencia a rutinas</h3>
                        </div>
                    </div>
                    <div class="card-back bg-[#9370DB] text-white rounded-lg shadow-md p-4 flex items-center justify-center">
                        <p>Tienen problemas para adaptarse a cambios en la rutina o en el entorno.</p>
                    </div>
                </div>
            </div>
            <div class="card-flip">
                <div class="card-inner relative w-full h-64">
                    <div class="card-front bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{asset('images/violin.png') }}')">
                        <div class="card-overlay absolute inset-0 flex items-end p-4">
                            <h3 class="text-xl font-semibold text-white">Intereses restringidos</h3>
                        </div>
                    </div>
                    <div class="card-back bg-[#3CB371] text-white rounded-lg shadow-md p-4 flex items-center justify-center">
                        <p>Pueden tener intereses muy específicos y enfocados en áreas particulares, como la música, los números o la tecnología.</p>
                    </div>
                </div>
            </div>
            <div class="card-flip">
                <div class="card-inner relative w-full h-64">
                    <div class="card-front bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{asset('images/dificultad.png') }}')">
                        <div class="card-overlay absolute inset-0 flex items-end p-4">
                            <h3 class="text-xl font-semibold text-white">Desarrollo desigual de habilidades</h3>
                        </div>
                    </div>
                    <div class="card-back bg-[#FF6347] text-white rounded-lg shadow-md p-4 flex items-center justify-center">
                        <p>Algunas habilidades pueden ser muy avanzadas mientras otras están retrasadas.</p>
                    </div>
                </div>
            </div>
            <div class="card-flip">
                <div class="card-inner relative w-full h-64">
                    <div class="card-front bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{asset('images/creativo2.png') }}')">
                        <div class="card-overlay absolute inset-0 flex items-end p-4">
                            <h3 class="text-xl font-semibold text-white">Habilidades excepcionales</h3>
                        </div>
                    </div>
                    <div class="card-back bg-[#4682B4] text-white rounded-lg shadow-md p-4 flex items-center justify-center">
                        <p>Algunas personas con este diagnóstico pueden presentar habilidades excepcionales en áreas específicas, como la memoria, la atención al detalle o la creatividad.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-[#A0A8FF] text-white p-6">
        <div class="max-w-5xl mx-auto flex flex-col items-center">
            <!-- Enlaces -->
            <div class="flex flex-wrap justify-center gap-4 mb-6">
                <a href="{{ route('index')}}" class="hover:underline px-3 py-2 border-dashed border border-white rounded-md transition-colors duration-300 hover:bg-white hover:text-[#A0A8FF]">Inicio</a>
                <a href="{{ route('index.tea')}}" class="hover:underline px-3 py-2 border-dashed border border-white rounded-md transition-colors duration-300 hover:bg-white hover:text-[#A0A8FF]">Informate</a>
                <a href="{{ route('index.nosotros')}}" class="hover:underline px-3 py-2 border-dashed border border-white rounded-md transition-colors duration-300 hover:bg-white hover:text-[#A0A8FF]">Nosotros</a>
                <a href="{{ route('index.login')}}" class="hover:underline px-3 py-2 border-dashed border border-white rounded-md transition-colors duration-300 hover:bg-white hover:text-[#A0A8FF]">Inicia Sesión</a>
                <a href="{{ route('index.login')}}" class="hover:underline px-3 py-2 border-dashed border border-white rounded-md transition-colors duration-300 hover:bg-white hover:text-[#A0A8FF]">Registrate</a>
            </div>

            <!-- Iconos de redes sociales -->
            <div class="flex justify-center space-x-4 mb-6">
                <a href="#" class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center hover:bg-[#4267B2] transition-colors duration-300 group">
                    <svg class="w-5 h-5 text-[#A0A8FF] group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center hover:bg-[#1DA1F2] transition-colors duration-300 group">
                    <svg class="w-5 h-5 text-[#A0A8FF] group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                    </svg>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center hover:bg-[#EA4335] transition-colors duration-300 group">
                    <svg class="w-5 h-5 text-[#A0A8FF] group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"></path>
                    </svg>
                </a>
                <a href="#" class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center hover:bg-[#E4405F] transition-colors duration-300 group">
                    <svg class="w-5 h-5 text-[#A0A8FF] group-hover:text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
            </div>

            <!-- Créditos -->
            <div class="text-center">
                <p>Creardo por TeAssist. Todos los derechos reservados</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var mobileMenu = document.getElementById('mobile-menu');
            var menuIcon = this.querySelector('svg');

            if (mobileMenu.classList.contains('hidden')) {
                // Abrir el menú
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                    mobileMenu.style.opacity = '1';
                    mobileMenu.style.transform = 'translateY(0)';
                }, 10);
            } else {
                // Cerrar el menú
                mobileMenu.style.maxHeight = '0px';
                mobileMenu.style.opacity = '0';
                mobileMenu.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }

            menuIcon.children[0].classList.toggle('hidden');
            menuIcon.children[1].classList.toggle('hidden');
        });
        document.addEventListener('DOMContentLoaded', function() {
            var slider = tns({
                container: '.slider',
                items: 1,
                slideBy: 'page',
                autoplay: true,
                controls: false,
                nav: true,
                autoplayButtonOutput: false,
                gutter: 0, // Asegura que no haya espacio entre las diapositivas
                edgePadding: 0, // Elimina el relleno en los bordes
                preventScrollOnTouch: 'auto'
            });
        });
    </script>
</body>
</html>
