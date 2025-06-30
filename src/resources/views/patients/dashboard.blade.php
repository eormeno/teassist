<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>¡Hola {{ $patientName }}! - Mi Espacio TEA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-image: url('images/patron.png');
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            min-height: 100vh;
            padding: 20px;
        }

        /* Header */
        .header {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 25px;
            border: 3px solid #81C784;
            text-align: center;
        }

        .logo {
            width: 80px;
            height: auto;
            margin: 0 auto 15px;
            animation: gentle-bounce 3s ease-in-out infinite;
        }

        .logo img {
            width: 100%;
            height: auto;
        }

        @keyframes gentle-bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-3px);
            }

            60% {
                transform: translateY(-2px);
            }
        }

        .welcome-title {
            color: #2E7D32;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .welcome-subtitle {
            color: #4CAF50;
            font-size: 18px;
            line-height: 1.5;
        }

        /* Main container */
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Cards grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 25px;
        }

        /* Base card styles */
        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 25px;
            border: 3px solid transparent;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #4CAF50, #8BC34A);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        /* Activities card */
        .activities-card {
            border-color: #81C784;
            background: linear-gradient(135deg, #E8F5E8 0%, #F1F8E9 100%);
        }

        .activities-card .card-icon {
            font-size: 48px;
            margin-bottom: 15px;
            display: block;
            animation: rotate-gentle 4s ease-in-out infinite;
        }

        @keyframes rotate-gentle {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-3deg);
            }

            75% {
                transform: rotate(3deg);
            }
        }

        .card-title {
            color: #2E7D32;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-content {
            color: #388E3C;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .activity-counter {
            background: #4CAF50;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 15px;
            font-size: 18px;
        }

        /* Mood card */
        .mood-card {
            border-color: #FFB74D;
            background: linear-gradient(135deg, #FFF8E1 0%, #FFECB3 100%);
        }

        .mood-card .card-title {
            color: #F57C00;
        }

        .mood-card .card-content {
            color: #FF8F00;
        }

        .mood-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .mood-btn {
            width: 80px;
            height: 80px;
            border: none;
            border-radius: 50%;
            font-size: 36px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mood-btn:hover {
            transform: scale(1.1) translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .mood-btn.happy {
            background: linear-gradient(135deg, #4CAF50, #66BB6A);
        }

        .mood-btn.neutral {
            background: linear-gradient(135deg, #9E9E9E, #BDBDBD);
        }

        .mood-btn.sad {
            background: linear-gradient(135deg, #2196F3, #42A5F5);
        }

        /* Progress card */
        .progress-card {
            border-color: #9C27B0;
            background: linear-gradient(135deg, #F3E5F5 0%, #E1BEE7 100%);
        }

        .progress-card .card-title {
            color: #7B1FA2;
        }

        .progress-card .card-content {
            color: #8E24AA;
        }

        .progress-visual {
            display: flex;
            gap: 8px;
            margin: 15px 0;
        }

        .progress-star {
            font-size: 24px;
            color: #FFD700;
            animation: twinkle 2s ease-in-out infinite;
        }

        .progress-star:nth-child(2) {
            animation-delay: 0.3s;
        }

        .progress-star:nth-child(3) {
            animation-delay: 0.6s;
        }

        .progress-star:nth-child(4) {
            animation-delay: 0.9s;
        }

        .progress-star:nth-child(5) {
            animation-delay: 1.2s;
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.7;
                transform: scale(1.1);
            }
        }

        /* Achievements card */
        .achievements-card {
            border-color: #FF9800;
            background: linear-gradient(135deg, #FFF3E0 0%, #FFE0B2 100%);
        }

        .achievements-card .card-title {
            color: #E65100;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 15px;
        }

        .achievement-badge {
            background: #FF9800;
            color: white;
            padding: 10px;
            border-radius: 15px;
            text-align: center;
            font-size: 24px;
            transition: transform 0.3s ease;
        }

        .achievement-badge:hover {
            transform: scale(1.1);
        }

        /* Buttons */
        .btn {
            padding: 15px 25px;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4CAF50, #66BB6A);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        .btn-danger {
            background: linear-gradient(135deg, #F44336, #EF5350);
            color: white;
            margin-top: 20px;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(244, 67, 54, 0.3);
        }

        /* Quick actions bar */
        .quick-actions {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border: 3px solid #81C784;
            text-align: center;
            margin-bottom: 25px;
        }

        .quick-actions-title {
            color: #2E7D32;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .quick-actions-grid {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .quick-action-btn {
            padding: 12px 20px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quick-action-btn:hover {
            background: #388E3C;
            transform: translateY(-2px);
        }

        /* Accessibility controls */
        .accessibility-controls {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
            z-index: 1000;
        }

        .accessibility-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #4CAF50;
            background: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .accessibility-btn:hover {
            background: #4CAF50;
            color: white;
        }

        /* Logout section */
        .logout-section {
            text-align: center;
            margin-top: 30px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cards-grid {
                grid-template-columns: 1fr;
            }

            .welcome-title {
                font-size: 24px;
            }

            .mood-buttons {
                gap: 10px;
            }

            .mood-btn {
                width: 60px;
                height: 60px;
                font-size: 28px;
            }

            .quick-actions-grid {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Time-based greeting animation */
        .greeting-animation {
            animation: fade-in 1s ease-in;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Controles de accesibilidad -->
    <div class="accessibility-controls">
        <button class="accessibility-btn" onclick="increaseFontSize()" title="Aumentar texto">
            A+
        </button>
        <button class="accessibility-btn" onclick="toggleAnimations()" title="Pausar animaciones">
            ⏸️
        </button>
    </div>

    <div class="dashboard-container">
        <!-- Header -->
        <div class="header greeting-animation">
            <div class="logo">
                <img src="{{ asset('images/LogoTEA.png') }}" alt="Logo TEA" />
            </div>
            <h1 class="welcome-title">👋 ¡Hola [Nombre]!</h1>
            <p class="welcome-subtitle">Este es tu espacio para jugar, aprender y compartir cómo te sentís.</p>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h3 class="quick-actions-title">🚀 Acciones rápidas</h3>
            <div class="quick-actions-grid">
                <button class="quick-action-btn">
                    <span>🎯</span>
                    <span>Mi Progreso</span>
                </button>
                <button class="quick-action-btn">
                    <span>⚙️</span>
                    <span>Configuración</span>
                </button>
                <button class="quick-action-btn">
                    <span>🏆</span>
                    <span>Mis Logros</span>
                </button>
                <button class="quick-action-btn">
                    <span>❓</span>
                    <span>Ayuda</span>
                </button>
            </div>
        </div>

        <!-- Main Cards Grid -->
        <div class="cards-grid">
            <!-- Activities Card -->
            <div class="card activities-card">
                <span class="card-icon">🎮</span>
                <h4 class="card-title">Mis juegos y actividades</h4>
                <div class="card-content">
                    <!-- Cuando hay actividades -->
                    <div class="activity-counter">{{ $activitiesCount }} actividades</div>

                    @if ($activitiesCount > 0)
                        <p>¡Tienes nuevas actividades esperándote! Cada juego te ayudará a aprender algo nuevo de manera
                            divertida.</p>
                        <a href="{{ route('patient.activities') }}" class="btn btn-primary">🎯 Ver mis actividades</a>
                    @else
                        <p>Aquí verás tus actividades cuando estén disponibles. ¡Pronto tendrás juegos increíbles para
                            disfrutar!</p>
                    @endif

                    <!-- Cuando no hay actividades (comentado para mostrar el diseño) -->
                    <!-- <p>Aquí verás tus actividades cuando estén disponibles. ¡Pronto tendrás juegos increíbles para disfrutar!</p> -->
                </div>
            </div>

            <!-- Mood Card -->
            <div class="card mood-card">
                @csrf
                <h4 class="card-title">😊 ¿Cómo te sentís hoy?</h4>
                <div class="card-content">
                    <p>Es importante compartir cómo te sientes. ¡Elige la carita que mejor represente tu estado de
                        ánimo!</p>
                    <form method="POST" action="/patient/mood/store" style="margin-top: 20px;">
                        <input type="hidden" name="_token" value="csrf-token-here">
                        <div class="mood-buttons">
                            <button name="mood" value="feliz" class="mood-btn happy"
                                title="¡Me siento muy feliz!">😄</button>
                            <button name="mood" value="neutral" class="mood-btn neutral"
                                title="Me siento normal">😐</button>
                            <button name="mood" value="triste" class="mood-btn sad"
                                title="Me siento un poco triste">😢</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Progress Card -->
            <div class="card progress-card">
                <h4 class="card-title">📈 Mi progreso</h4>
                <div class="card-content">
                    <p>¡Mira todo lo que has logrado esta semana!</p>
                    <div class="progress-visual">
                        <span class="progress-star">⭐</span>
                        <span class="progress-star">⭐</span>
                        <span class="progress-star">⭐</span>
                        <span class="progress-star">⭐</span>
                        <span class="progress-star">☆</span>
                    </div>
                    <p><strong>4 de 5 actividades completadas</strong></p>
                    <p>¡Estás muy cerca de completar todas las actividades de esta semana!</p>
                </div>
            </div>

            <!-- Achievements Card -->
            <div class="card achievements-card">
                <h4 class="card-title">🏆 Mis logros recientes</h4>
                <div class="card-content">
                    <p>¡Felicitaciones por estos increíbles logros!</p>
                    <div class="achievements-grid">
                        <div class="achievement-badge" title="Primera actividad completada">🎯</div>
                        <div class="achievement-badge" title="Expresaste tus emociones">💝</div>
                        <div class="achievement-badge" title="Semana completa de actividades">📅</div>
                        <div class="achievement-badge" title="Gran progreso">⚡</div>
                        <div class="achievement-badge" title="Jugador constante">🎮</div>
                        <div class="achievement-badge" title="¡Nuevo logro por desbloquear!">❓</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Section -->
        <div class="logout-section">
            
            <form method="POST" action="{{ route('patient.logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger mt-4">Cerrar sesión</button>
            </form>

        </div>

    </div>

    <script>
        const userName = @json(auth()->user()->name);
        // Variables globales
        let currentFontSize = 16;
        let animationsEnabled = true;

        // Función para aumentar tamaño de fuente
        function increaseFontSize() {
            currentFontSize += 2;
            if (currentFontSize > 24) currentFontSize = 16;
            document.body.style.fontSize = currentFontSize + 'px';
        }

        // Función para pausar/reanudar animaciones
        function toggleAnimations() {
            animationsEnabled = !animationsEnabled;
            const style = document.createElement('style');

            if (!animationsEnabled) {
                style.innerHTML = `
                    *, *::before, *::after {
                        animation-duration: 0.01ms !important;
                        animation-iteration-count: 1 !important;
                        transition-duration: 0.01ms !important;
                    }
                `;
                document.head.appendChild(style);
            } else {
                const existingStyle = document.querySelector('style');
                if (existingStyle) {
                    existingStyle.remove();
                }
            }
        }

        // Greeting dinámico basado en la hora
        function updateGreeting() {
            const hour = new Date().getHours();
            const greetingElement = document.querySelector('.welcome-title');

            if (hour < 12) {
                greetingElement.innerHTML = `🌅 ¡Buenos días ${userName}!`;
            } else if (hour < 18) {
                greetingElement.innerHTML = `☀️ ¡Buenas tardes ${userName}!`;
            } else {
                greetingElement.innerHTML = `🌙 ¡Buenas noches ${userName}!`;
            }
        }

        // Inicializar
        document.addEventListener('DOMContentLoaded', function () {
            updateGreeting();
        });
    </script>
</body>

</html>