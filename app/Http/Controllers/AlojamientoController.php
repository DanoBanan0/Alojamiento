<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alojamiento;

class AlojamientoController extends Controller
{
    /**
     * Mostrar los alojamientos disponibles (solo activos).
     */
    public function index()
    {
        // Solo mostrar alojamientos activos, y los destacados primero
        $alojamientos = Alojamiento::where('activo', true)
            ->orderByDesc('destacado')
            ->get();

        return view('alojamientos.index', compact('alojamientos'));
    }

    /**
     * Mostrar todos los alojamientos (para el admin).
     */
    public function adminIndex()
    {
        // Mostrar todos (activos e inactivos)
        $alojamientos = Alojamiento::orderByDesc('destacado')->get();

        return view('admin.alojamientos.index', compact('alojamientos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
