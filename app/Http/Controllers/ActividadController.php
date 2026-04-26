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

        // Se añaden los usuarios 
        $query = Actividad::with(['clases.monitor', 'clases.usuarios']);

        // Si el usuario elige una actividad en el filtro, se hace un WHERE
        if ($request->filled('actividad_id')) {
            $query->where('id', $request->actividad_id);
        }

        // Ejecutamos
        $actividades = $query->get();
        
        return view('actividades', compact('actividades', 'todasLasActividades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ]);

        Actividad::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return back()->with('success', 'Actividad añadida correctamente.');
    }

    public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();

        return back()->with('success', 'Actividad eliminada correctamente.');
    }

    public function edit($id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('admin.actividades-edit', compact('actividad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ]);

        $actividad = Actividad::findOrFail($id);
        $actividad->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('clases-actividades')->with('success', 'Actividad actualizada correctamente.');
    }

    public function create()
    {
        return view('admin.actividades-create');
    }
}