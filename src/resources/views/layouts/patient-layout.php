<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Panel del Paciente' }}</title>

    @vite(['resources/css/app.css', 'resources/css/patient-dashboard.css'])
</head>

<body class="patient-body">
    <div class="container mx-auto max-w-7xl px-4 py-4">
        <header style="margin-bottom: 20px;">
            <h1>{{ $title ?? 'Panel del Paciente' }}</h1>
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>



    <script>
        // Primero las funciones que se usan en onclick
        let currentFontSize = 16;
        let animationsEnabled = true;

       

        // Funciones para modales
        function openModal(id) {
            document.getElementById(id).classList.add('show');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('show');
        }

        // Después el DOMContentLoaded
        document.addEventListener('DOMContentLoaded', function () {
            const hour = new Date().getHours();
            const greetingElement = document.getElementById('greeting');
            const name = @json(auth() -> user() -> name);

            if (hour < 12) {
                greetingElement.innerHTML = `🌅 ¡Buenos días ${name}!`;
            } else if (hour < 18) {
                greetingElement.innerHTML = `☀️ ¡Buenas tardes ${name}!`;
            } else {
                greetingElement.innerHTML = `🌙 ¡Buenas noches ${name}!`;
            }

            // Event listeners para modales
            document.querySelectorAll('button[data-modal-id]').forEach(btn => {
                btn.addEventListener('click', function () {
                    const modalId = btn.getAttribute('data-modal-id');
                    openModal(modalId);
                });
            });

            document.querySelectorAll('button[data-close]').forEach(btn => {
                btn.addEventListener('click', function () {
                    const modalId = btn.getAttribute('data-close');
                    closeModal(modalId);
                });
            });

            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', function (e) {
                    if (e.target === modal) {
                        closeModal(modal.id);
                    }
                });
            });
        });
    </script>


</body>

</html>