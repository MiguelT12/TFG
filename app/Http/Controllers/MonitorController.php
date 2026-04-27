<?php

namespace App\Http\Controllers;

use App\Models\Clase;

class MonitorController extends Controller
{
    public function verAlumnos($id)
    {
        $clase = Clase::with(['actividad', 'usuarios'])->findOrFail($id);

        return view('monitor.alumnos', compact('clase'));
    }

    public function eliminarAlumno($claseId, $usuarioId)
    {
        $clase = Clase::findOrFail($claseId);

        // Eliminar el usuario de la clase 
        $clase->usuarios()->detach($usuarioId);

        return back()->with('success', 'Alumno eliminado correctamente.');
    }
}