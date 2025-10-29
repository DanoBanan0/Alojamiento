<?php
// app/Http/Controllers/UserAlojamientoController.php

namespace App\Http\Controllers;

use App\Models\Alojamiento; // Importa el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa el Facade de Autenticación

class UserAlojamientoController extends Controller
{
    public function toggle(Alojamiento $alojamiento)
    {

        $user = Auth::user();

        $user->alojamientos()->toggle($alojamiento->id);

        return back();
    }
}