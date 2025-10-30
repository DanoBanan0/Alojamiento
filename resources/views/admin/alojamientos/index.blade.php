@extends('layouts.admin')

@section('title', 'Gestión de Alojamientos')

@section('content')

<div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para crear alojamiento --}}
    <div class="mb-6">
        <a href="{{ route('admin.alojamientos.create') }}" 
           class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
           Agregar Alojamiento
        </a>
    </div>

    {{-- Lista de alojamientos --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($alojamientos as $alojamiento)
            <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">
                <img src="{{ $alojamiento->imagen_url }}" alt="{{ $alojamiento->nombre }}" class="w-full h-48 object-cover">
                
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $alojamiento->nombre }}</h3>
                    <p class="text-gray-600 mt-1">{{ $alojamiento->descripcion }}</p>
                    <p class="mt-2 font-bold text-indigo-600">${{ $alojamiento->precio_por_noche }}</p>

                    {{-- Botón Editar --}}
                    <a href="{{ route('admin.alojamientos.edit', $alojamiento) }}" 
                       class="inline-block mt-3 px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                       Editar
                    </a>

                    {{-- Toggle Activo --}}
                    <form action="{{ route('admin.alojamientos.toggleActivo', $alojamiento) }}" method="POST" class="inline-block mt-3 ml-2">
                        @csrf
                        @method('PATCH')
                        <button type="submit" 
                            class="px-3 py-1 rounded text-white {{ $alojamiento->activo ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }}">
                            {{ $alojamiento->activo ? 'Desactivar' : 'Activar' }}
                        </button>
                    </form>

                    {{-- Toggle Destacado --}}
                    <form action="{{ route('admin.alojamientos.toggleDestacado', $alojamiento) }}" method="POST" class="inline-block mt-3 ml-2">
                        @csrf
                        @method('PATCH')
                        <button type="submit" 
                            class="px-3 py-1 rounded text-white {{ $alojamiento->destacado ? 'bg-indigo-800 hover:bg-indigo-900' : 'bg-gray-500 hover:bg-gray-600' }}">
                            {{ $alojamiento->destacado ? 'Quitar Destacado' : 'Destacar' }}
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No hay alojamientos disponibles.</p>
        @endforelse
    </div>
</div>

@endsection