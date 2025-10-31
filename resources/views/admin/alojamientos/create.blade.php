@extends('layouts.admin')

@section('title', 'Agregar Alojamiento')

@section('content')

<div class="py-2 max-w-4xl mx-auto sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Agregar Alojamiento</h2>
        <p class="mt-2 text-gray-600">Completa la información del nuevo alojamiento</p>
    </div>

    {{-- Mensajes de error --}}
    @if($errors->any())
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
        <div class="flex items-center mb-2">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span class="font-semibold">Por favor corrige los siguientes errores:</span>
        </div>
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.alojamientos.store') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        @csrf

        {{-- Primera fila: 2 columnas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            {{-- Nombre --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre *</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                    placeholder="Nombre del alojamiento"
                    required>
            </div>

            {{-- Precio por noche --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Precio por noche *</label>
                <div class="relative">
                    <span class="absolute left-3 top-3 text-gray-500">$</span>
                    <input type="number" step="0.01" name="precio_por_noche" value="{{ old('precio_por_noche') }}" 
                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                        placeholder="0.00"
                        min="0"
                        required>
                </div>
            </div>
        </div>

        {{-- Segunda fila: 1 columna (descripción) --}}
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Descripción *</label>
            <textarea name="descripcion" rows="4"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                placeholder="Describe las características y comodidades del alojamiento"
                required>{{ old('descripcion') }}</textarea>
        </div>

        {{-- Tercera fila: 2 columnas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            {{-- URL de la imagen --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">URL de la imagen *</label>
                <input type="url" name="imagen_url" value="{{ old('imagen_url') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                    placeholder="https://ejemplo.com/imagen.jpg"
                    required>
            </div>

            {{-- Estados en línea más grandes --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">Estados</label>
                <div class="flex items-center space-x-8">
                    {{-- Activo --}}
                    <div class="flex items-center">
                        <input type="checkbox" name="activo" value="1" checked 
                            class="w-5 h-5 text-red-600 border-gray-300 rounded focus:ring-red-500 transform scale-125">
                        <label class="ml-3 text-base font-medium text-gray-800">Activo</label>
                    </div>

                    {{-- Destacado --}}
                    <div class="flex items-center">
                        <input type="checkbox" name="destacado" value="1"
                            class="w-5 h-5 text-red-600 border-gray-300 rounded focus:ring-red-500 transform scale-125">
                        <label class="ml-3 text-base font-medium text-gray-800">Destacado</label>
                    </div>
                </div>
            </div>
        </div>

        {{-- Botones Centrados --}}
        <div class="flex justify-center gap-4 pt-6 border-t border-gray-200">
            <button type="submit" 
                class="inline-flex items-center justify-center px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-200">
                <i class="fas fa-plus mr-2"></i>
                Agregar Alojamiento
            </button>
            
            <a href="{{ route('admin.alojamientos.index') }}" 
                class="inline-flex items-center justify-center px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-200">
                <i class="fas fa-times mr-2"></i>
                Cancelar
            </a>
        </div>
    </form>
</div>

@endsection