<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use App\Models\ReservaPista;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PistaController extends Controller
{    
    public function index()
    {
        $pistas = Pista::all();
        $reservas = ReservaPista::all();

        return view('pistas', compact('pistas', 'reservas'));
    }

    public function reservar(Request $request)
    {
        $request->validate([
            'pista_id' => 'required|exists:pistas,id',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'duracion' => 'required|in:1,2',
        ]);

        $inicio = Carbon::parse($request->hora_inicio);
        $fin = $inicio->copy()->addHours((int) $request->duracion);
        $horaMin = Carbon::createFromTime(10, 0);
        $horaMax = Carbon::createFromTime(20, 0);

        if ($inicio->lt($horaMin) || $fin->gt($horaMax)) {
            return back()->with('error', 'Solo puedes reservar entre las 10:00 y las 20:00');
        }

        $existe = ReservaPista::where('pista_id', $request->pista_id)
            ->where('fecha', $request->fecha)
            ->where(function ($query) use ($inicio, $fin) {
                $query->whereBetween('hora_inicio', [$inicio, $fin])
                    ->orWhereBetween('hora_fin', [$inicio, $fin])
                    ->orWhere(function ($q) use ($inicio, $fin) {
                        $q->where('hora_inicio', '<=', $inicio)
                          ->where('hora_fin', '>=', $fin);
                    });
            })
            ->exists();

        if ($existe) {
            return back()->with('error', 'Ese horario ya está ocupado');
        }

        /** @var \App\Models\User $user */
        $user = $request->user();

        ReservaPista::create([
            'id_cliente' => $user->id,
            'pista_id' => $request->pista_id,
            'fecha' => $request->fecha,
            'hora_inicio' => $inicio,
            'hora_fin' => $fin,
        ]);

        return back()->with('success', 'Pista reservada correctamente');
    }

    public function cancelar(\Illuminate\Http\Request $request, $id)
    {
        $reserva = ReservaPista::findOrFail($id);

        /** @var \App\Models\User $user */
        $user = $request->user();

        if ($reserva->id_cliente !== $user->id) {
            abort(403);
        }

        $reserva->delete();

        return back()->with('success', 'Reserva cancelada');
    }

    public function adminIndex()
    {
        $pistas = Pista::all();
        return view('admin.gestion-pistas', compact('pistas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ]);

        Pista::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
        ]);

        return back()->with('success', 'Pista añadida correctamente.');
    }

    public function edit($id)
    {
        $pista = Pista::findOrFail($id);
        return view('admin.pistas-edit', compact('pista'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ]);

        $pista = Pista::findOrFail($id);
        $pista->update([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('admin.pistas')->with('success', 'Pista actualizada correctamente.');
    }

    public function destroy($id)
    {
        $pista = Pista::findOrFail($id);
        $pista->delete();

        return back()->with('success', 'Pista eliminada correctamente.');
    }
}