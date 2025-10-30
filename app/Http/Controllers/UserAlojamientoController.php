<?php

namespace App\Http\Controllers;

use App\Models\Alojamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAlojamientoController extends Controller
{
    public function toggle(Alojamiento $alojamiento)
{
    $user = Auth::user();

    $wasAttached = $user->alojamientos()->where('alojamiento_id', $alojamiento->id)->exists();

    $user->alojamientos()->toggle($alojamiento->id);

    $message = $wasAttached
        ? 'Alojamiento retirado de tu cuenta.'
        : 'Alojamiento agregado a tu cuenta.';

    return back()->with('success', $message);
}

}