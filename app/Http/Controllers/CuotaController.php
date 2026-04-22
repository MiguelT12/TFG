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

    public function contratar($id)
    {
        $user = \App\Models\User::find(auth()->id()); // Buscamos el usuario directamente a la BD
        $user->id_cuota = $id;
        $user->save();

        return redirect()->route('dashboard')->with('success', '¡Tarifa contratada con éxito!');
    }
}