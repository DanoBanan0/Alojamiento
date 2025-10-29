<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alojamiento;

class DashboardController extends Controller
{
    public function index()
    {
        $alojamientos = Alojamiento::all();

        return view('dashboard', [
            'alojamientos' => $alojamientos
        ]);
    }
}
