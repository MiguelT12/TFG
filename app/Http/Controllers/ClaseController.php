<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'actividad_id' => 'required|exists:actividades,id',
            'monitor_id' => 'required|exists:users,id',
            'dia_semana' => 'required|string',
            'hora_inicio' => 'required',
            'capacidad' => 'required|integer|min:1',
        ]);

        Clase::create([
            'id_actividad' => $request->actividad_id, 
            'id_monitor' => $request->monitor_id,     
            'dia_semana' => $request->dia_semana,
            'hora_inicio' => $request->hora_inicio,
            'capacidad' => $request->capacidad,
        ]);

        return back()->with('success', 'Clase programada correctamente.');
    }

    public function edit($id)
    {
        $clase = Clase::findOrFail($id);
        $actividades = \App\Models\Actividad::all();
        $monitores = \App\Models\User::where('role', 'monitor')->get();
        
        return view('admin.clases-edit', compact('clase', 'actividades', 'monitores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'actividad_id' => 'required|exists:actividades,id',
            'monitor_id' => 'required|exists:users,id',
            'dia_semana' => 'required|string',
            'hora_inicio' => 'required',
            'capacidad' => 'required|integer|min:1',
        ]);

        $clase = Clase::findOrFail($id);
        $clase->update([
            'id_actividad' => $request->actividad_id, 
            'id_monitor' => $request->monitor_id,     
            'dia_semana' => $request->dia_semana,
            'hora_inicio' => $request->hora_inicio,
            'capacidad' => $request->capacidad,
        ]);

        return redirect()->route('clases-actividades')->with('success', 'Clase actualizada correctamente.');
    }

    public function destroy($id)
    {
        $clase = Clase::findOrFail($id);
        $clase->delete();

        return back()->with('success', 'Clase eliminada correctamente.');
    }
}