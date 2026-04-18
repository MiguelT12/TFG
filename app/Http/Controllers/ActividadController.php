<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index(Request $request)
    {
        // Obtenemos todas las actividades 
        $todasLasActividades = Actividad::all();

        // Preparamos la consulta para las tarjetas
        $query = Actividad::with(['clases.monitor']);

        // Si el usuario elige una actividad en el filtro, hacemos un WHERE
        if ($request->filled('actividad_id')) $query->where('id', $request->actividad_id);

        // Ejecutamos
        $actividades = $query->get();
        
        return view('actividades', compact('actividades', 'todasLasActividades'));
    }
}