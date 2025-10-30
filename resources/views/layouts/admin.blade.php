<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">

    <!-- Header fijo -->
    <div class="fixed top-0 left-0 right-0 z-10 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end h-16 items-center">

                <!-- Link a la web pública -->
                <a href="{{ url('/') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 no-underline">
                    Ver Sitio
                </a>

                <!-- Dashboard admin -->
                <a href="{{ url('/dashboard') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 no-underline">
                    Dashboard
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="ml-4">
                    @csrf
                    <button type="submit" class="font-semibold text-red-600 hover:text-red-800 no-underline">
                        Salir
                    </button>
                </form>

            </div>
        </div>
    </div>

    <!-- Contenido admin -->
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 mt-16">
        @yield('content')
    </div>

</body>
</html>
