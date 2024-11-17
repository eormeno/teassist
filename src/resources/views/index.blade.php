<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeAssist - Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        .menu-transition {
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
    </style>
</head>

<body class="bg-[#E5E7FF] font-sans min-h-screen flex flex-col">
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
                        <a href="{{ route('index') }}" class="text-[#4172A9] text-lg font-bold">Home</a>
                        <a href="{{ route('index.tea') }}" class="text-gray-700 text-lg">Infórmate</a>
                        <a href="{{ route('index.nosotros') }}" class="text-gray-700 text-lg">Nosotros</a>
                    </div>
                    <div class="flex-1 flex justify-end space-x-4">
                        @auth
                            <x-button onclick="location.href='{{ route('dashboard')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Dashboard</x-button>
                        @else
                            <x-button onclick="location.href='{{ route('index.login')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Iniciar Sesión</x-button>
                            <x-button onclick="location.href='{{ route('index.login')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Registrarse</x-button>
                        @endauth
                    </div>
                </div>
            </div>
            <div id="mobile-menu" class="hidden lg:hidden mt-4 space-y-4 menu-transition max-h-0 opacity-0 transform translate-y-[-10px] overflow-hidden">
                <div class="flex flex-col items-center space-y-4">
                    <a href="{{ route('index') }}" class="text-[#4172A9] text-lg font-bold">Home</a>
                    <a href="{{ route('index.tea') }}" class="text-gray-700 text-lg">Infórmate</a>
                    <a href="{{ route('index.nosotros') }}" class="text-gray-700 text-lg">Nosotros</a>
                        @auth
                            <x-button onclick="location.href='{{ route('dashboard')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Dashboard</x-button>
                        @else
                            <x-button onclick="location.href='{{ route('index.login')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Iniciar Sesión</x-button>
                            <x-button onclick="location.href='{{ route('index.login')}}'" class="border-2 border-[#A0A8FF] text-[#A0A8FF] px-5 py-3 rounded-md hover:bg-[#A0A8FF] hover:text-white transition duration-300">Registrarse</x-button>
                        @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow flex items-center justify-center px-4 py-10">
        <div class="max-w-6xl w-full mx-auto flex flex-col lg:flex-row items-center justify-center space-y-8 lg:space-y-0 lg:space-x-8">
            <!-- Contenedor del texto y botón -->
            <div class="lg:w-1/2 space-y-6 text-center lg:text-left">
                <h1 class="text-4xl sm:text-5xl font-bold">TeAssit</h1>
                <p class="text-lg">Es una app especializada para personas con trastorno de espectro autista, empieza ahora</p>
                <button onclick="location.href='{{ route('index.login')}}'" class="bg-[#A0A8FF] text-white px-6 py-3 rounded-md text-lg hover:bg-[#4172A9] transition">Comencemos</button>
            </div>

            <!-- Contenedor de la imagen -->
            <div class="lg:w-1/2">
                <img src="{{ asset('images/chicaFlor-Photoroom.jpeg') }}" alt="Ilustración de una persona con flores en la cabeza" class="max-w-full h-auto mx-auto">
            </div>
        </div>
    </main>

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
    </script>
</body>

</html>
