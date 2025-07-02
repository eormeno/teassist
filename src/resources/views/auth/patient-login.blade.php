<!DOCTYPE html>
<html lang="{{ str_replace('', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingreso para Pacientes</title>
    @vite('resources/css/patient-login.css')
</head>

<body>
   

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
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- Formulario -->
        <form id="loginForm" action="{{ route('patient.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code" class="label">
                    <span>🔑</span>
                    <span>Mi código de acceso</span>
                </label>
                <div class="input-container">
                    <input type="text" id="code" name="code" class="input" placeholder="Escribe tu código aquí" required
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password" class="label">
                        <span>🔒</span>
                        <span>Mi contraseña secreta</span>
                    </label>
                    <div class="input-container">
                        <input type="password" id="password" name="password" class="input"
                            placeholder="Escribe tu contraseña aquí" required autocomplete="current-password">
                    </div>
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
        let currentFontSize = 100;

        function increaseFontSize() {
            currentFontSize += 10;
            if (currentFontSize > 140) currentFontSize = 100;
            document.documentElement.style.fontSize = currentFontSize + '%';
        }
    </script>

</body>

</html>