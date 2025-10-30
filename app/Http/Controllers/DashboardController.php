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
            // Redirige al dashboard de administrador
            return redirect()->route('admin.alojamientos.index');
        }

        // Dashboard de usuario normal
        $alojamientos = Alojamiento::all();
        return view('dashboard', [
            'alojamientos' => $alojamientos
        ]);
    }
}


