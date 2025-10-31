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

<body class="bg-white text-gray-800 font-sans antialiased">

    <!-- HEADER -->
    <header class="fixed top-0 left-0 right-0 z-30 bg-gray-900 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex items-center justify-between h-16">
            <a href="/" class="flex items-center gap-2">
                <div class="w-8 h-8 bg-red-600 rounded-md flex items-center justify-center">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-white">
                        <path d="M3 11.5L12 3l9 8.5V21a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1v-9.5z"
                            fill="currentColor" />
                    </svg>
                </div>
                <span class="text-lg font-semibold">Fairfield Hotel</span>
            </a>

            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="text-sm font-medium text-white/90 hover:text-white">Dashboard</a>
                @else
                <a href="{{ route('login') }}"
                    class="text-sm font-medium text-white/90 hover:text-white">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="text-sm font-medium text-white/90 hover:text-white">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- HERO -->
    <section class="relative pt-16">
        <div class="h-[70vh] relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1533777324565-a040eb52fac2?q=80&w=1600&auto=format&fit=crop"
                alt="Alojamiento hero" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>

            <div class="relative z-10 flex items-center justify-center h-full text-center px-4">
                <div class="max-w-2xl">
                    <h1 class="text-4xl md:text-5xl font-bold text-white">Descubre tu próxima escapada</h1>
                    <p class="mt-4 text-white/80 text-lg">Explora alojamientos únicos, cómodos y modernos en los mejores destinos.</p>
                    <a href="#alojamientos"
                        class="inline-block mt-6 px-6 py-3 bg-red-600 text-white font-semibold rounded-md shadow hover:brightness-95 transition">
                        Ver alojamientos
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ALOJAMIENTOS -->
    <section id="alojamientos" class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
        <div class="flex flex-col items-center text-center">
            <h2 class="text-3xl font-semibold text-jet">Nuestros Alojamientos</h2>
            <p class="text-sm text-gray-500 mt-1">Encuentra el lugar perfecto para tu próxima aventura</p>
        </div>

        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($alojamientos as $alojamiento)
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition flex flex-col">
                <img src="{{ $alojamiento->imagen_url }}" alt="{{ $alojamiento->nombre }}"
                    class="w-full h-48 object-cover">
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="text-lg font-semibold text-jet">{{ $alojamiento->nombre }}</h3>
                    <p class="text-sm text-gray-600 mt-1 flex-grow">{{ $alojamiento->descripcion }}</p>

                    <div class="mt-4 flex items-center justify-between">
                        <div>
                            <div class="text-xl font-bold text-red-600">${{ $alojamiento->precio_por_noche }}
                                <span class="text-sm font-medium text-gray-500">/ noche</span>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            @empty
            <p class="text-gray-500 col-span-full text-center">No hay alojamientos disponibles en este momento.</p>
            @endforelse
        </div>
    </section>


    <!-- SERVICIOS -->
    <section id="servicios" class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-semibold text-center text-jet">Servicios</h2>
            <p class="mt-2 text-center text-gray-600">Todo lo que necesitas para una estancia inolvidable</p>

            <div class="mt-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">

                <!-- Wi-Fi -->
                <div class="flex flex-col items-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition">
                    <i class="fas fa-wifi text-[#c1121f] text-3xl mb-3"></i>
                    <div class="text-sm font-semibold text-jet">Wi-Fi</div>
                    <div class="text-xs text-gray-500 mt-1">Alta velocidad</div>
                </div>

                <!-- Piscina -->
                <div class="flex flex-col items-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition">
                    <i class="fas fa-swimming-pool text-[#c1121f] text-3xl mb-3"></i>
                    <div class="text-sm font-semibold text-jet">Piscina</div>
                    <div class="text-xs text-gray-500 mt-1">Área de natación</div>
                </div>

                <!-- Desayuno -->
                <div class="flex flex-col items-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition">
                    <i class="fas fa-coffee text-[#c1121f] text-3xl mb-3"></i>
                    <div class="text-sm font-semibold text-jet">Desayuno</div>
                    <div class="text-xs text-gray-500 mt-1">Café y buffet</div>
                </div>

                <!-- Spa -->
                <div class="flex flex-col items-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition">
                    <i class="fas fa-spa text-[#c1121f] text-3xl mb-3"></i>
                    <div class="text-sm font-semibold text-jet">Spa</div>
                    <div class="text-xs text-gray-500 mt-1">Relajación total</div>
                </div>

                <!-- Gimnasio -->
                <div class="flex flex-col items-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition">
                    <i class="fas fa-dumbbell text-[#c1121f] text-3xl mb-3"></i>
                    <div class="text-sm font-semibold text-jet">Gimnasio</div>
                    <div class="text-xs text-gray-500 mt-1">Abierto 24/7</div>
                </div>

                <!-- Estacionamiento -->
                <div class="flex flex-col items-center p-5 bg-white rounded-2xl shadow-sm hover:shadow-md transition">
                    <i class="fas fa-car text-[#c1121f] text-3xl mb-3"></i>
                    <div class="text-sm font-semibold text-jet">Estacionamiento</div>
                    <div class="text-xs text-gray-500 mt-1">Amplio y seguro</div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERÍA -->
    <section id="galeria" class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-900">Galería de instalaciones</h2>
            <p class="text-sm text-gray-500">Conoce nuestros espacios destacados.</p>
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="rounded-xl overflow-hidden shadow">
                <img src="https://images.unsplash.com/photo-1542317854-7c4f35a6f3d6?q=80&w=1200&auto=format&fit=crop"
                    alt="Lobby" class="w-full h-48 object-cover">
                <div class="p-3 bg-white">
                    <div class="font-semibold text-gray-900">Lobby</div>
                    <div class="text-xs text-gray-500 mt-1">Recepción y área lounge</div>
                </div>
            </div>

            <div class="rounded-xl overflow-hidden shadow">
                <img src="https://images.unsplash.com/photo-1501117716987-c8e0b3a4a1d4?q=80&w=1200&auto=format&fit=crop"
                    alt="Piscina" class="w-full h-48 object-cover">
                <div class="p-3 bg-white">
                    <div class="font-semibold text-gray-900">Piscina</div>
                    <div class="text-xs text-gray-500 mt-1">Exterior e interior</div>
                </div>
            </div>

            <div class="rounded-xl overflow-hidden shadow">
                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=1200&auto=format&fit=crop"
                    alt="Restaurante" class="w-full h-48 object-cover">
                <div class="p-3 bg-white">
                    <div class="font-semibold text-gray-900">Restaurante</div>
                    <div class="text-xs text-gray-500 mt-1">Cocina internacional</div>
                </div>
            </div>

            <div class="rounded-xl overflow-hidden shadow">
                <img src="https://images.unsplash.com/photo-1505691723518-36a43b66a2f6?q=80&w=1200&auto=format&fit=crop"
                    alt="Suite" class="w-full h-48 object-cover">
                <div class="p-3 bg-white">
                    <div class="font-semibold text-gray-900">Suite</div>
                    <div class="text-xs text-gray-500 mt-1">Con vista al mar</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="contacto" class="bg-gray-900 text-white py-6">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Columna 1: Información -->
            <div>
                <h4 class="text-xl font-semibold">Fairfield Hotel</h4>
                <p class="mt-3 text-sm text-white/70 leading-relaxed">
                    Dirección: Calle Falsa 123, Ciudad <br>
                    Tel: +503 7765 0933 <br>
                    Email: contacto@fairfielhotel.com
                </p>
            </div>

            <!-- Columna 2: Enlaces -->
            <div>
                <h5 class="text-lg font-semibold">Enlaces</h5>
                <ul class="mt-4 space-y-2 text-white/70 text-sm">
                    <li><a href="#alojamientos" class="hover:text-white transition">Habitaciones</a></li>
                    <li><a href="#servicios" class="hover:text-white transition">Servicios</a></li>
                    <li><a href="#galeria" class="hover:text-white transition">Galería</a></li>
                </ul>
            </div>

            <!-- Columna 3: Redes sociales -->
            <div>
                <h5 class="text-lg font-semibold">Síguenos</h5>
                <div class="mt-4 flex items-center gap-4">
                    <a href="#" class="p-2 rounded-full bg-white/10 hover:bg-red-600 transition">
                        <!-- Facebook -->
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12a10 10 0 1 0-11.6 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1 .9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.2l-.3 3h-1.9v7A10 10 0 0 0 22 12z" />
                        </svg>
                    </a>
                    <a href="#" class="p-2 rounded-full bg-white/10 hover:bg-red-600 transition">
                        <!-- Instagram -->
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3.3a4.7 4.7 0 1 0 0 9.4 4.7 4.7 0 0 0 0-9.4zm0 7.7a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm5.5-8.7a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                    </a>
                    <a href="#" class="p-2 rounded-full bg-white/10 hover:bg-red-600 transition">
                        <!-- Twitter/X -->
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 5.9a8.9 8.9 0 0 1-2.6.7A4.4 4.4 0 0 0 21.4 4a8.7 8.7 0 0 1-2.8 1.1 4.4 4.4 0 0 0-7.5 4A12.5 12.5 0 0 1 3 4.6a4.4 4.4 0 0 0 1.4 5.9 4.4 4.4 0 0 1-2-.6v.1a4.4 4.4 0 0 0 3.6 4.3 4.3 4.3 0 0 1-2 .1 4.4 4.4 0 0 0 4.1 3 8.8 8.8 0 0 1-5.5 1.9A9.4 9.4 0 0 1 2 19.3a12.5 12.5 0 0 0 6.8 2c8.2 0 12.7-6.8 12.7-12.7v-.6A8.8 8.8 0 0 0 22 5.9z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-10 text-center text-sm text-white/50 border-t border-white/5 pt-6">
            © <span id="year"></span> Fairfield Hotel. Todos los derechos reservados.
        </div>

        <script>
            // Actualiza el año automáticamente
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>
    </footer>

</body>

</html>