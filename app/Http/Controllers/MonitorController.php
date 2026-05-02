<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Support\Facades\Auth;

class MonitorController extends Controller
{
    // Ver alumnos de una clase
    public function verAlumnos($id)
    {
        $clase = Clase::with(['actividad', 'usuarios'])->findOrFail($id);

        return view('monitor.alumnos', compact('clase'));
    }

    // Eliminar alumno de una clase
    public function eliminarAlumno($claseId, $usuarioId)
    {
        $clase = Clase::findOrFail($claseId);

        // Eliminar el usuario de la clase
        $clase->usuarios()->detach($usuarioId);

        return back()->with('success', 'Alumno eliminado correctamente.');
    }

    // Calendario de clases de monitor
    public function calendario()
    {
        $monitor = Auth::user();

        // Obtener clases del monitor con actividad y usuarios
        $clases = Clase::with(['actividad', 'usuarios'])
            ->where('id_monitor', $monitor->id) 
            ->get();

        return view('monitor.calendario', compact('clases'));
    }
}