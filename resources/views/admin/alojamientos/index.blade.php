@extends('layouts.admin')

@section('title', 'Gestión de Alojamientos')

@section('content')

<div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">

    {{-- Mensajes de éxito --}}
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    </div>
    @endif

    {{-- Botón para crear alojamiento --}}
    <div class="mb-6 ">
        <a href="{{ route('admin.alojamientos.create') }}"
            class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-200">
            <i class="fas fa-plus mr-2"></i>
            Agregar Alojamiento
        </a>
    </div>

    {{-- Lista de alojamientos - Ordenados por destacado primero --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            // Ordenar alojamientos: destacados primero
            $alojamientosOrdenados = $alojamientos->sortByDesc('destacado');
        @endphp
        
        @forelse($alojamientosOrdenados as $alojamiento)
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition duration-200 flex flex-col h-[420px]"> {{-- Altura fija --}}
            {{-- Imagen --}}
            <div class="relative flex-shrink-0">
                <img src="{{ $alojamiento->imagen_url }}" alt="{{ $alojamiento->nombre }}" class="w-full h-40 object-cover"> {{-- Altura fija para imagen --}}
                {{-- Badges --}}
                <div class="absolute top-3 right-3 flex flex-col gap-2">
                    @if($alojamiento->destacado)
                    <span class="px-2 py-1 bg-indigo-600 text-white text-xs font-semibold rounded-full">
                        <i class="fas fa-star mr-1"></i>Destacado
                    </span>
                    @endif
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $alojamiento->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $alojamiento->activo ? 'Activo' : 'Inactivo' }}
                    </span>
                </div>
            </div>

            {{-- Contenido - Ocupa el espacio restante --}}
            <div class="p-5 flex flex-col flex-grow">
                {{-- Información --}}
                <div class="flex-grow">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $alojamiento->nombre }}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $alojamiento->descripcion }}</p> {{-- Máximo 2 líneas --}}
                    <p class="text-xl font-bold text-red-600">${{ $alojamiento->precio_por_noche }} <span class="text-sm font-normal text-gray-500">/noche</span></p>
                </div>

                {{-- Acciones - Siempre en la parte inferior --}}
                <div class="flex flex-wrap gap-2 mt-4 pt-4 border-t border-gray-100">
                    {{-- Botón Destacar/Quitar destacado PRIMERO --}}
                    <form action="{{ route('admin.alojamientos.toggleDestacado', $alojamiento) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        @if($alojamiento->destacado)
                        <button type="submit" class="inline-flex items-center px-3 py-2 bg-gray-600 text-white text-sm font-semibold rounded-lg hover:bg-gray-700 transition duration-200">
                            <i class="fas fa-star mr-1"></i>Quitar Dest.
                        </button>
                        @else
                        <button type="submit" class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition duration-200">
                            <i class="fas fa-star mr-1"></i>Destacar
                        </button>
                        @endif
                    </form>

                    {{-- Botón Editar --}}
                    <a href="{{ route('admin.alojamientos.edit', $alojamiento) }}"
                        class="inline-flex items-center px-3 py-2 bg-yellow-500 text-white text-sm font-semibold rounded-lg hover:bg-yellow-600 transition duration-200">
                        <i class="fas fa-edit mr-1"></i>Editar
                    </a>

                    {{-- Toggle Activo --}}
                    <form action="{{ route('admin.alojamientos.toggleActivo', $alojamiento) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        @if($alojamiento->activo)
                        <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition duration-200">
                            <i class="fas fa-pause mr-1"></i>Desactivar
                        </button>
                        @else
                        <button type="submit" class="inline-flex items-center px-3 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700 transition duration-200">
                            <i class="fas fa-play mr-1"></i>Activar
                        </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @empty
        {{-- Estado vacío --}}
        <div class="col-span-full text-center py-12">
            <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-hotel text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No hay alojamientos</h3>
            <p class="text-gray-600 mb-6">Comienza agregando tu primer alojamiento al sistema.</p>
            <a href="{{ route('admin.alojamientos.create') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-200">
                <i class="fas fa-plus mr-2"></i>
                Agregar Primer Alojamiento
            </a>
        </div>
        @endforelse
    </div>
</div>

@endsection