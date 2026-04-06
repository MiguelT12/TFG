<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    
    // Mostrar formulario de login
    
    public function create(): View
    {
        return view('auth.login');
    }

    
    // Procesar login
    
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        //  REDIRECCIÓN SEGÚN ROL
        if ($user->role === 'admin') {
            return redirect()->route('admin');
        }

        if ($user->role === 'monitor') {
            return redirect()->route('monitor');
        }

        // 👤 Usuario normal
        return redirect()->route('dashboard');
    }

    
    // Logout
    
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //  Redirige a tu página personalizada
        return redirect('/');
    }
}
