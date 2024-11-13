<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    @vite('resources/css/app.css')

</head>

<body class=" login-page" style="background-image: url('{{ asset('images/patron.png') }}');">


    <!-- Encabezado -->
    <header class="flex flex-col items-center mb-6">
        <img src="{{ asset('images/LogoTEA.png') }}" alt="Logo" class="mb-2 w-32 h-auto">
        <h1 class="text-3xl font-bold text-[#042940]">Bienvenido a TEAssist</h1>
    </header>

    <!-- Formulario de inicio de sesión -->
    <div class="container mx-auto p-6">
        <div class="form-group">
            @if ($errors->any())
                <div class="alert">
                    {{ $errors->first() }}
                </div>
            @endif
            <form action="{{ url('/login') }}" method="POST">
                @csrf <!-- Asegúrate de incluir este token de seguridad -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Correo Electrónico</label>
                    <input type="email" id="email" name="email" class="form-input border p-2 w-full rounded" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-input border p-2 w-full rounded"
                        required>
                </div>
                <button type="submit" class="form-button w-full p-2 rounded">Iniciar Sesión</button>
            </form>
            <div class="text-center mt-4">
                <a href="#" class="text-sm text-[#1e1e49]">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="text-center mt-4">
                <p class="text-gray-600 text-sm">¿No tienes una cuenta?
                    <a href="#" class="register-link">Regístrate aquí</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
