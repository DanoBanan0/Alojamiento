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

        $user->alojamientos()->toggle($alojamiento->id);

        return back();
    }
}