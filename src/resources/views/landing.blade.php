<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEAssist</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/hfg-gmuend/openmoji@latest/color/svg/openmoji.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html,
        body {
            height: 100%;
            /* Asegura que el contenedor ocupe el 100% de la altura de la ventana */
            margin: 0;
            /* Elimina márgenes predeterminados */
        }

        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            flex-direction: column;
            /* Coloca los elementos en columna */
        }

        .content {
            flex: 1;
            /* Permite que la sección de contenido ocupe el espacio restante */
        }

        header {
            background-color: white;
            /* Fondo del header */
            border-bottom: 4px solid #042940;
            /* Borde inferior */
            color: black;
            /* Color del texto */
            padding: 16px;
            /* Espaciado interno */
            display: flex;
            /* Disposición flex para centrar elementos */
            justify-content: space-between;
            /* Espaciado entre elementos */
            align-items: center;
            /* Alinear elementos verticalmente */
        }

        footer {
            border-top: 2px solid #fff;
            /* Línea superior blanca */
        }

        footer a {
            transition: color 0.3s;
            /* Transición suave */
        }

        .bg-[#042940] {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .bg-[#DBF227] {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .text-gray-700 {
            color: #4A5568;
            /* Un gris más oscuro */
        }

        .text-[#042940] {
            color: #0B3D5D;
            /* Un azul más oscuro si es necesario */
        }

        .testimonial-carousel {
            position: relative;
            display: flex;
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .testimonial-item {
            min-width: 100%;
            transition: transform 0.5s ease;
            opacity: 0;
            display: none;
        }

        .testimonial-item.active {
            display: block;
            opacity: 1;
        }

        .prev-button,
        .next-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #005C53;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 18px;
        }

        .prev-button {
            left: -40px;
        }

        .next-button {
            right: -40px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container mx-auto px-4 flex items-center">
            <img src="{{ asset('images/LogoTEA.png') }}" alt="TEApp Icon" class="h-24 w-24 mr-4">
            <div class="text-left">
                <h1 class="text-4xl text-[#042940] font-bold">TEAssist</h1>

            </div>
        </div>
        <div class="px-4 flex items-center">
            <a href="{{ route('login') }}"
                class="border border-[#042940] text-black py-2 px-4 rounded mr-6 text-lg hover:bg-[#042940] hover:text-white transition duration-300">Ingresar</a>
            <a href="{{ route('register') }}"
                class="border border-[#042940] text-black py-2 px-4 rounded text-lg hover:bg-[#042940] hover:text-white transition duration-300">Registrarse</a>
        </div>
    </header>

    <!-- Contenedor principal -->
    <div class="content">

        <!-- Sección de Registro - Hero -->
        <section class="relative bg-[#0075B2] h-[40vh] flex items-center justify-center mt-10 shadow-lg">
            <!-- Añadida sombra -->
            <div class="container mx-auto text-center py-10">
                <h2 class="text-4xl font-bold text-white mb-4">Un Espacio de Apoyo y Aprendizaje</h2>
                <p class="text-lg text-white mb-6">Donde el conocimiento se une para transformar vidas.</p>
                <!-- Cambiado a azul -->
                <a href="/register"
                <a href="/register" class="bg-[#1E1E49] text-white py-2 px-20 rounded-lg text-lg hover:bg-[#A4C2DB] hover:text-black transition duration-300">Explora</a>

                <!-- Botón más grande y largo -->
            </div>
        </section>
        <!-- Características Clave -->
        <section class="py-16 bg-gray-100 text-center">
            <h3 class="text-3xl font-bold text-gray-800 mb-8">Descubre cómo TEAssist beneficia a cada perfil de usuario
            </h3>
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
                <div
                    class="bg-white rounded-lg shadow-lg border border-[#D6D58E] hover:shadow-xl transition-shadow duration-300 flex flex-col w-80 mx-auto">
                    <img src="{{ asset('images/medico.jpg') }}" alt="Médicos"
                        class="h-2/3 w-full object-cover rounded-t-lg">
                    <div class="p-4 flex-grow">
                        <h4 class="text-xl font-semibold text-gray-800">Médicos</h4>
                        <p class="text-gray-600 mt-2">Acceso rápido a historial clínico y seguimiento de pacientes.</p>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-lg border border-[#D6D58E] hover:shadow-xl transition-shadow duration-300 flex flex-col w-80 mx-auto">
                    <img src="{{ asset('images/terapeuta.jpg') }}" alt="Terapeutas"
                        class="h-2/3 w-full object-cover rounded-t-lg">
                    <div class="p-4 flex-grow">
                        <h4 class="text-xl font-semibold text-gray-800">Terapeutas</h4>
                        <p class="text-gray-600 mt-2">Herramientas para terapia personalizada y seguimiento de avances.
                        </p>
                    </div>
                </div>
                <div
                    class="bg-white rounded-lg shadow-lg border border-[#D6D58E] hover:shadow-xl transition-shadow duration-300 flex flex-col w-80 mx-auto">
                    <img src="{{ asset('images/paciente.jpg') }}" alt="Pacientes"
                        class="h-2/3 w-full object-cover rounded-t-lg">
                    <div class="p-4 flex-grow">
                        <h4 class="text-xl font-semibold text-gray-800">Pacientes</h4>
                        <p class="text-gray-600 mt-2">Registra cómo te sientes y diviértete mientras cuidas de tu salud.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-8 bg-gray-100">
            <div class="container mx-auto px-4">
                <h3 class="text-3xl font-bold text-center text-[#042940] mb-4">Recursos y Artículos</h3>

                <h4 class="text-xl font-semibold text-center text-[#042940] mb-4">Lee contenido educativo sobre el
                    autismo</h4>

                <div class="bg-white p-6 rounded-lg shadow-lg"> <!-- Tarjeta combinada -->
                    <div class="flex flex-col md:flex-row">
                        <!-- Sección de Introducción -->
                        <div class="md:w-2/3 pr-4">
                            <h5 class="text-lg font-semibold text-[#042940] mb-4">Comprendiendo el Autismo</h5>
                            <p class="text-sm text-gray-700 mb-4"> <!-- Margen inferior para mayor separación -->
                                El autismo, o Trastorno del Espectro Autista (TEA), es una condición neurológica que
                                afecta el desarrollo del cerebro y la forma en que las personas se comunican y
                                socializan. A menudo, las personas con autismo pueden tener desafíos en la comunicación
                                y las interacciones sociales, pero también pueden mostrar habilidades excepcionales en
                                áreas específicas.
                            </p>

                            <h4 class="text-lg font-semibold text-[#042940] mb-4">Datos Clave sobre el Autismo</h4>
                            <ul class="list-disc ml-6 text-gray-700 mb-4">
                                <li class="text-sm">1 de cada 54 niños es diagnosticado con autismo.</li>
                                <li class="text-sm">El autismo afecta a todos los grupos raciales y étnicos.</li>
                                <li class="text-sm">Los síntomas pueden variar significativamente entre individuos.</li>
                            </ul>
                            <ul class="mb-4"> <!-- Asegúrate de cerrar correctamente la lista -->
                                <li><a href="https://www.autismo.org.ar"
                                        class="text-[#1e1e49] hover:underline text-sm">Autismo Argentina</a></li>
                                <li><a href="https://www.cuantocuento.org"
                                        class="text-[#1e1e49] hover:underline text-sm">Cuánto Cuento</a></li>
                            </ul>

                        </div>

                        <!-- Sección de Imagen -->
                        <div class="md:w-1/3 flex flex-col items-center">
                            <img src="{{ asset('images/autismo.jpg')}}" alt="Autismo"
                                class="w-full h-36 object-cover rounded-lg mb-4" />

                            <!-- Botón para aprender más -->
                            <div class="text-center mt-6"> <!-- Aumentamos el margen superior aquí -->
                                <a href="/learn-more"
                                    class="bg-[#9ABB50] text-black py-2 px-20 rounded-lg text-lg hover:bg-teal-600 transition duration-300">Aprende
                                    Más
                                </a> <!-- Aumentamos el padding horizontal aquí -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-6 bg-gray-100">
            <div class="container mx-auto">
                <h3 class="text-3xl font-bold text-[#1E1E49] text-center mb-4">Testimonios de Usuarios</h3>
                <div class="flex justify-center">
                    <div class="bg-white border-2 border-[#1E1E49] p-4 rounded-lg shadow-md mx-2 w-full max-w-[300px]">
                        <p class="text-gray-700 mb-1 text-xs">"TEAssist ha revolucionado la manera en que manejo mis
                            pacientes."</p>
                        <h4 class="text-xs font-semibold text-gray-800">Dr. Juan Pérez, Médico</h4>
                    </div>
                    <div class="bg-white border-2 border-[#1E1E49] p-4 rounded-lg shadow-md mx-2 w-full max-w-[300px]">
                        <p class="text-gray-700 mb-1 text-xs">"Ahora puedo hacer un seguimiento mucho más detallado de
                            mis terapias."</p>
                        <h4 class="text-xs font-semibold text-gray-800">Lic. Ana García, Terapeuta</h4>
                    </div>
                    <div class="bg-white border-2 border-[#1E1E49] p-4 rounded-lg shadow-md mx-2 w-full max-w-[300px]">
                        <p class="text-gray-700 mb-1 text-xs">"Gracias a TEAssist, mi trabajo se ha vuelto más eficiente."
                        </p>
                        <h4 class="text-xs font-semibold text-gray-800">Ing. Roberto Gómez, Ingeniero</h4>
                    </div>
                </div>
            </div>
        </section>



        <footer class="bg-[#1E1E49] text-white py-6">
            <div class="container mx-auto">
                <ul class="flex justify-center space-x-10 mb-4">
                    <li><a href="/about" class="hover:text-gray-300">Sobre Nosotros</a></li>
                    <li><a href="/terms" class="hover:text-gray-300">Términos de Uso</a></li>
                    <li><a href="/privacy" class="hover:text-gray-300">Política de Privacidad</a></li>
                    <li><a href="/privacy" class="hover:text-gray-300">Preguntas Frecuentes</a></li>
                </ul>
                <div class="flex justify-center space-x-4 mb-4">
                    <a href="https://facebook.com" class="hover:text-gray-300"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com" class="hover:text-gray-300"><i class="fab fa-x"></i></a>
                    <a href="https://instagram.com" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <p class="text-center text-sm">&copy; 2024 TEAssist. Todos los derechos reservados.</p>
    </div>
    </footer>



</body>

</html>
