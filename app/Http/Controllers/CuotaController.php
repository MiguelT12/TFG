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
}