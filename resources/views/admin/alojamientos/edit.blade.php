@extends('layouts.admin')

@section('title', 'Editar Alojamiento')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Editar Alojamiento</h2>

@if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.alojamientos.update', $alojamiento) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="mb-4">
        <label class="block font-semibold mb-1">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $alojamiento->nombre) }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Descripción</label>
        <textarea name="descripcion" class="w-full border rounded px-3 py-2">{{ old('descripcion', $alojamiento->descripcion) }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Precio por noche</label>
        <input type="number" step="0.01" name="precio_por_noche" value="{{ old('precio_por_noche', $alojamiento->precio_por_noche) }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">URL de la imagen</label>
        <input type="url" name="imagen_url" value="{{ old('imagen_url', $alojamiento->imagen_url) }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4 flex items-center">
        <input type="checkbox" name="activo" value="1" {{ $alojamiento->activo ? 'checked' : '' }} class="mr-2">
        <label>Activo</label>
    </div>

    <div class="mb-4 flex items-center">
        <input type="checkbox" name="destacado" value="1" {{ $alojamiento->destacado ? 'checked' : '' }} class="mr-2">
        <label>Destacado</label>
    </div>

    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        Actualizar Alojamiento
    </button>
</form>
@endsection
