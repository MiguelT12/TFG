<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        // Traemos todas las actividades con sus clases y monitores
        $actividades = Actividad::with(['clases.monitor'])->get();
        
        return view('actividades', compact('actividades'));
    }
}