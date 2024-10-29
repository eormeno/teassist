
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TEApp - Software para Personas con TEA</title>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>

<body class="font-sans antialiased bg-gradient-to-br from-blue-50 to-green-50 dark:from-gray-900 dark:to-gray-800 dark:text-white min-h-screen">
    <!-- Header -->
    <header class="fixed w-full bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm shadow-md z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 bg-gradient-to-r from-green-400 to-blue-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">T</span>
                        </div>
                    </div>
                    <h1 class="ml-4 text-xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">TEApp</h1>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">Panel</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">
                                    Cerrar Sesión
                                </button>
                            </form>
                        @else
                            <a href="#caracteristicas" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">Características</a>
                            <a href="#beneficios" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">Beneficios</a>
                            <a href="#contacto" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">Contacto</a>
                            <a href="{{ route('login') }}" class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-4 py-2 rounded-md text-sm font-medium hover:opacity-90 transition">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md text-sm font-medium border border-green-500 hover:bg-green-50 dark:hover:bg-green-900/30 transition">Registrarse</a>
                            @endif
                        @endauth
                    @endif
                </nav>

                <!-- Mobile menu button -->
                <button id="menuBtn" class="md:hidden rounded-md p-2 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobileMenu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">Panel</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">
                                Cerrar Sesión
                            </button>
                        </form>
                    @else
                        <a href="#caracteristicas" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">Características</a>
                        <a href="#beneficios" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">Beneficios</a>
                        <a href="#contacto" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-green-100 dark:hover:bg-green-900/30 transition">Contacto</a>
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-gradient-to-r from-green-500 to-blue-500 text-white">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium border border-green-500 hover:bg-green-50 dark:hover:bg-green-900/30 transition">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="inicio" class="pt-24 pb-12 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="md:w-1/2" data-aos="fade-right">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Software para Personas con TEA</h2>
                    <p class="text-lg mb-8 text-gray-600 dark:text-gray-300">Desarrollamos soluciones tecnológicas innovadoras para mejorar la calidad de vida de las personas con Trastorno del Espectro Autista.</p>
                    <div class="flex gap-4">
                        @guest
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-6 py-3 rounded-lg font-medium hover:opacity-90 transition">Comenzar Ahora</a>
                        @endguest
                        <a href="#caracteristicas" class="bg-white dark:bg-gray-800 px-6 py-3 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">Saber Más</a>
                    </div>
                </div>
                <div class="md:w-1/2" data-aos="fade-left">
                    <img src="{{ asset('images/hero_image.jpg') }}" alt="Ilustración de TEApp" class="rounded-2xl shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="caracteristicas" class="py-12 px-4 bg-white/50 dark:bg-gray-800/50">
        <div class="container mx-auto max-w-6xl">
            <h2 class="text-3xl font-bold text-center mb-12">Características Principales</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg" data-aos="fade-up">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Personalización Total</h3>
                    <p class="text-gray-600 dark:text-gray-300">Adaptamos la interfaz y el contenido según las necesidades específicas de cada usuario.</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Rutinas Claras</h3>
                    <p class="text-gray-600 dark:text-gray-300">Estructura y organización visual de actividades diarias para mayor independencia.</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Seguimiento de Progreso</h3>
                    <p class="text-gray-600 dark:text-gray-300">Monitoreo detallado del avance y logros alcanzados.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="beneficios" class="py-12 px-4">
        <div class="container mx-auto max-w-6xl">
            <h2 class="text-3xl font-bold text-center mb-12">Beneficios</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg" data-aos="fade-right">
                    <h3 class="text-xl font-semibold mb-4">Desarrollo Integral</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Habilidades cognitivas
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Habilidades emocionales
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Habilidades motrices
                        </li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg" data-aos="fade-left">
                    <h3 class="text-xl font-semibold mb-4">Apoyo Terapéutico</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Complemento terapéutico personalizado
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Seguimiento profesional
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Informes de progreso
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- About TEA Section -->
    <section class="py-12 px-4 bg-white/50 dark:bg-gray-800/50">
        <div class="container mx-auto max-w-6xl">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="md:w-1/2" data-aos="fade-right">
                    <h2 class="text-3xl font-bold mb-6">¿Qué es el Trastorno del Espectro Autista (TEA)?</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        El Trastorno del Espectro Autista (TEA) es una condición que afecta el desarrollo neurológico y se caracteriza por:
                    </p>
                    <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                            </svg>
                            Diferencias en la comunicación e interacción social
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                            </svg>
                            Patrones de comportamiento e intereses específicos
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                            </svg>
                            Procesamiento sensorial único
                        </li>
                    </ul>
                </div>
                <div class="md:w-1/2" data-aos="fade-left">
                    <img src="{{ asset('images/image_moreInfo.png') }}" alt="Ilustración sobre TEA" class="rounded-2xl shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="py-12 px-4">
        <div class="container mx-auto max-w-4xl">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
                <h2 class="text-3xl font-bold text-center mb-8">Contáctenos</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <h3 class="text-xl font-semibold">Información de Contacto</h3>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <a href="mailto:info@teapp.com" class="text-blue-600 dark:text-blue-400 hover:underline">info@teapp.com</a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+1 234 567 890</span>
                        </div>
                    </div>
                    <form class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium mb-1">Nombre</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-700 dark:border-gray-600" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-700 dark:border-gray-600" required>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium mb-1">Mensaje</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 rounded-lg border dark:bg-gray-700 dark:border-gray-600" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-blue-500 text-white py-2 px-4 rounded-lg hover:opacity-90 transition">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">TEApp</h3>
                    <p class="text-gray-400">Soluciones tecnológicas para personas con TEA</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Enlaces Rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="#inicio" class="text-gray-400 hover:text-white transition">Inicio</a></li>
                        <li><a href="#caracteristicas" class="text-gray-400 hover:text-white transition">Características</a></li>
                        <li><a href="#beneficios" class="text-gray-400 hover:text-white transition">Beneficios</a></li>
                        <li><a href="#contacto" class="text-gray-400 hover:text-white transition">Contacto</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Política de Privacidad</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Términos de Uso</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} TEApp. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Initialize AOS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({
                duration: 800,
                once: true,
            });

            // Mobile menu toggle
            const menuBtn = document.getElementById('menuBtn');
            const mobileMenu = document.getElementById('mobileMenu');

            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
