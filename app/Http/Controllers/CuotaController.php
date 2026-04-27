<?php

namespace App\Http\Controllers;
use App\Models\Cuota;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    public function index()
    {
        $cuotas = Cuota::all();
        return view('dashboard', compact('cuotas')); 
    }
    
    public function mostrarTodos()
    {
        // Extraemos los planes directamente de la base de datos
        $cuotas = Cuota::all();

        return view('plan', compact('cuotas'));
    }

    public function confirmar($id)
    {
        $cuota = \App\Models\Cuota::findOrFail($id);
        return view('confirmar-tarifa', compact('cuota'));
    }

    public function contratar(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'telefono' => 'required|string|max:15',
            'metodo_pago' => 'required|string',
        ]);

        $cuota = \App\Models\Cuota::findOrFail($id);
        
        /** @var \App\Models\User $user */
        $user = $request->user();

        // Actualizar al usuario con la cuota y los nuevos datos
        $user->update([
            'id_cuota' => $cuota->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Has contratado la tarifa ' . $cuota->nombre . ' correctamente.');
    }
}