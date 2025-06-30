<!DOCTYPE html>
<html  lang="{{ str_replace('', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingreso para Pacientes</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }



        /* Contenedor principal */
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            border: 3px solid #81C784;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 128px;
            height: auto;
            margin: 0 auto 8px;
            animation: gentle-bounce 2s ease-in-out infinite;
        }

        .logo img {
            width: 100%;
            height: auto;
        }

        @keyframes gentle-bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-5px); }
            60% { transform: translateY(-3px); }
        }

        .title {
            color: #2E7D32;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #4CAF50;
            font-size: 18px;
            margin-bottom: 20px;
        }

        /* Formulario */
        .form-group {
            margin-bottom: 25px;
        }

        .label {
            display: block;
            color: #2E7D32;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .input-container {
            position: relative;
        }

        .input {
            width: 100%;
            padding: 15px;
            border: 3px solid #E0E0E0;
            border-radius: 15px;
            font-size: 18px;
            transition: all 0.3s ease;
            background: #F8F9FA;
        }

        .input:focus {
            outline: none;
            border-color: #4CAF50;
            background: white;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        .input.invalid {
            border-color: #F44336;
            background: #FFEBEE;
        }

        /* Botón */
        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #4CAF50, #66BB6A);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .submit-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        /* Ayuda */
        .help-section {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px solid #E8F5E8;
        }

        .help-text {
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .help-link {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            padding: 8px 16px;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .help-link:hover {
            background: #4CAF50;
            color: white;
        }

        /* Mensajes de error */
        .error-message {
            background: #FFEBEE;
            color: #C62828;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #F44336;
            font-size: 16px;
        }

        /* Controles de accesibilidad */
        .accessibility-controls {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
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
        }

        .accessibility-btn:hover {
            background: #4CAF50;
            color: white;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 20px;
                margin: 10px;
            }
            
            .title {
                font-size: 24px;
            }
            
            .input, .submit-btn {
                font-size: 16px;
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
    </div>

    <!-- Contenedor principal -->
    <div class="login-container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <img src="{{ asset('images/LogoTEA.png') }}" alt="Logo TEA" />
            </div>
            <h1 class="title">👋 ¡Hola!</h1>
            <p class="subtitle">Vamos a jugar y aprender juntos</p>
        </div>

        <!-- Mensaje de error -->
        <div class="error-message" id="errorMessage" style="display: none;">
            ⚠️ <span id="errorText"></span>
        </div>

        <!-- Formulario -->
        <form id="loginForm" action="{{ route('patient.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="label">
                    <span>📧</span>
                    <span>Mi correo electrónico</span>
                </label>
                <div class="input-container">
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="input"
                        placeholder="Escribe tu correo aquí"
                        required
                        autocomplete="email"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="label">
                    <span>🔒</span>
                    <span>Mi contraseña secreta</span>
                </label>
                <div class="input-container">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="input"
                        placeholder="Escribe tu contraseña aquí"
                        required
                        autocomplete="current-password"
                    >
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <span>🚀</span>
                <span>¡Empezar a jugar!</span>
            </button>
        </form>

        <!-- Ayuda -->
        <div class="help-section">
            <p class="help-text">¿Necesitas ayuda? 🧑‍🏫</p>
            <a href="#" class="help-link">Pedir ayuda a un adulto</a>
        </div>
    </div>

    <script>
        // Variables globales
        let currentFontSize = 16;

        // Función para aumentar tamaño de fuente
        function increaseFontSize() {
            currentFontSize += 2;
            if (currentFontSize > 24) currentFontSize = 16;
            document.body.style.fontSize = currentFontSize + 'px';
        }
    </script>
</body>
</html>