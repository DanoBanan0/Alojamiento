<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alojamiento;

class AlojamientoAdminController extends Controller
{
    /**
     * Mostrar todos los alojamientos.
     */
    public function index()
    {
        $alojamientos = Alojamiento::all();
        return view('admin.alojamientos.index', [
            'alojamientos' => $alojamientos
        ]);
    }

    /**
     * Mostrar el formulario para crear un alojamiento.
     */
    public function create()
    {
        return view('admin.alojamientos.create');
    }

    /**
     * Guardar un nuevo alojamiento.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'activo' => 'boolean',
            'destacado' => 'boolean',
        ]);

        Alojamiento::create($request->all());

        return redirect()->route('admin.alojamientos.index')->with('success', 'Alojamiento creado.');
    }

    /**
     * Mostrar el formulario para editar un alojamiento.
     */
    public function edit(Alojamiento $alojamiento)
    {
        return view('admin.alojamientos.edit', [
            'alojamiento' => $alojamiento
        ]);
    }

    /**
     * Actualizar un alojamiento.
     */
    public function update(Request $request, Alojamiento $alojamiento)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'activo' => 'boolean',
            'destacado' => 'boolean',
        ]);

        $alojamiento->update($request->all());

        return redirect()->route('admin.alojamientos.index')->with('success', 'Alojamiento actualizado.');
    }

    /**
     * Toggle del estado activo.
     */
    public function toggleActivo(Alojamiento $alojamiento)
    {
        $alojamiento->activo = !$alojamiento->activo;
        $alojamiento->save();

        return redirect()->back();
    }

    /**
     * Toggle del estado destacado.
     */
    public function toggleDestacado(Alojamiento $alojamiento)
    {
        $alojamiento->destacado = !$alojamiento->destacado;
        $alojamiento->save();

        return redirect()->back();
    }
}