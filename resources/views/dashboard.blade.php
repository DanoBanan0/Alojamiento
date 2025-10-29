<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alojamientos Disponibles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <p class="mb-6 text-lg text-gray-700">Explora nuestro catálogo y selecciona tus alojamientos favoritos.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($alojamientos as $alojamiento)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <img src="{{ $alojamiento->imagen_url }}" alt="{{ $alojamiento->nombre }}" class="w-full h-48 object-cover">

                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $alojamiento->nombre }}</h3>
                        <p class="mt-2 text-gray-600 text-sm">{{ $alojamiento->descripcion }}</p>
                        <p class="mt-4 font-bold text-indigo-600">$ {{ $alojamiento->precio_por_noche }} por noche</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-500">No hay alojamientos disponibles en este momento.</p>
                @endForelse
            </div>

        </div>
    </div>
</x-app-layout>