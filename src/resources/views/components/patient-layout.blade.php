@props(['title' => 'Panel del Paciente'])

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    
   @vite(['resources/css/patient-dashboard.css'])


</head>

<body style="background-color: #E8F5E9; ">
    <div class="container py-4">
        <header style="margin-bottom: 20px;">
            <h1>{{ $title }}</h1>
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>