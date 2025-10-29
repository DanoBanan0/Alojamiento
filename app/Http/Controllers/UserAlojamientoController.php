<?php
// app/Http/Controllers/UserAlojamientoController.php

namespace App\Http\Controllers;

use App\Models\Alojamiento; // Importa el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa el Facade de Autenticación

class UserAlojamientoController extends Controller
{
    /**
     * Alterna la selección de un alojamiento para el usuario actual.
     * (Esto cubre el Literal 3 y 4: seleccionar y quitar)
     */
    public function toggle(Alojamiento $alojamiento)
    {
        // Obtenemos al usuario que ha iniciado sesión
        $user = Auth::user();

        // Usamos el método toggle() de Eloquent.
        // Es mágico:
        // 1. Si el usuario NO tiene este alojamiento, lo AÑADE (attach).
        // 2. Si el usuario SÍ tiene este alojamiento, lo QUITA (detach).
        $user->alojamientos()->toggle($alojamiento->id);

        // Redirigimos al usuario de vuelta a la página anterior (el dashboard)
        return back();
    }
}