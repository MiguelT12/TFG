<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function nuevoUsuario()
    {
        return view('admin.usuarios-nuevo');
    }

    public function guardarUsuario(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido1' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,monitor,usuario',
        ]);

        User::create([
            'name' => $request->name,
            'apellido1' => $request->apellido1,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('dashboard')->with('success', 'Usuario creado correctamente.');
    }

    public function eliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('dashboard')->with('success', 'Usuario eliminado correctamente.');
    }

    public function reservasPistas()
    {
        $reservas = \App\Models\ReservaPista::with(['user', 'pista'])->latest()->get();
        
        return view('admin.reservas-pistas', compact('reservas'));
    }
}