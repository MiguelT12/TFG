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

        ReservaPista::create([
            'id_cliente' => auth()->id(),
            'pista_id' => $request->pista_id,
            'fecha' => $request->fecha,
            'hora_inicio' => $inicio,
            'hora_fin' => $fin,
        ]);

        return back()->with('success', 'Pista reservada correctamente');
    }

    public function cancelar($id)
    {
        $reserva = ReservaPista::findOrFail($id);

        if ($reserva->id_cliente !== auth()->id()) {
            abort(403);
        }

        $reserva->delete();

        return back()->with('success', 'Reserva cancelada');
    }
}