<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alojamiento;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            // Si el usuario es administrador, redirige a su dashboard
            return redirect()->route('admin.alojamientos.index');
        }

        // Si es un usuario normal, solo muestra alojamientos activos
        $alojamientos = Alojamiento::where('activo', true)
            ->orderByDesc('destacado')
            ->get();

        return view('dashboard', [
            'alojamientos' => $alojamientos
        ]);
    }
}
