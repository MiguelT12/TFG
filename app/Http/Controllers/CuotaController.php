<?php

namespace App\Http\Controllers;

use App\Models\Cuota; 
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    public function index()
    {
        // Coge las cuotas de la BBDD
        $cuotas = Cuota::all(); 

        // Se envían llamándolas tarifas
        return view('tarifas', compact('cuotas')); 
    }
}