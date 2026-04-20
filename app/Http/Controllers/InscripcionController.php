<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function apuntarse($id)
    {
        $user = auth()->user();
        $clase = Clase::findOrFail($id);
        
        // Si la clase esta llena, no deja apuntarse
        if ($clase->estaLlena()) {
            return back()->with('error', 'La clase está completa');
        }

        // Evitar duplicados
        if (!$user->clases()->where('clase_id', $id)->exists()) {
            $user->clases()->attach($id);
        }

        return back();
    }

    public function desapuntarse($id)
    {
        $user = auth()->user();

        // Quitar relación en tabla pivot
        $user->clases()->detach($id);

        return back();
    }
}