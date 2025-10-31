<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alojamientos Disponibles</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <!-- Barra superior -->
    <div class="fixed top-0 left-0 right-0 z-10 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end h-16 items-center">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 no-underline">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 no-underline">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 no-underline">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 mt-16">
        <h1 class="text-3xl font-bold text-gray-900">Nuestros Alojamientos</h1>
        <p class="mt-2 text-lg text-gray-700">Encuentra el lugar perfecto para tu próxima escapada.</p>

        <!-- Grid de alojamientos -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($alojamientos as $alojamiento)
                <div
                    class="bg-white border {{ $alojamiento->destacado ? 'border-yellow-400 shadow-lg' : 'border-gray-200 shadow-sm' }} 
                    rounded-lg overflow-hidden transition transform hover:scale-105 duration-200">
                    
                    <!-- Imagen del alojamiento -->
                    <img src="{{ $alojamiento->imagen_url }}" 
                         alt="{{ $alojamiento->nombre }}" 
                         class="w-full h-48 object-cover">

                    <div class="p-5 relative">
                        <!-- Insignia de destacado -->
                        @if($alojamiento->destacado)
                            <span class="absolute top-3 right-3 bg-yellow-400 text-white text-xs font-bold px-2 py-1 rounded">
                                ⭐ Destacado
                            </span>
                        @endif

                        <!-- Información del alojamiento -->
                        <h3 class="text-xl font-semibold text-gray-900">
                            {{ $alojamiento->nombre }}
                        </h3>
                        <p class="mt-2 text-gray-600 text-sm">
                            {{ $alojamiento->descripcion }}
                        </p>
                        <p class="mt-4 font-bold text-indigo-600">
                            $ {{ $alojamiento->precio_por_noche }} por noche
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No hay alojamientos disponibles en este momento.</p>
            @endforelse
        </div>
    </div>
</body>

</html>