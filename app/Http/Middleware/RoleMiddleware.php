<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Si no está logueado → al login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Si el rol NO está permitido → error 403
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'No tienes permiso para acceder');
        }

        return $next($request);
    }
}