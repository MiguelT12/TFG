<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuotaController;
use App\Models\Cuota;

Route::get('/', function () {
    return view('home');
});

// Dashboard 
Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    /** @var \App\Models\User $user */
    $user = $request->user();

    // Administrador
    if ($user->role === 'admin') {
        // 1. Buscamos todos los usuarios en la base de datos
        $usuarios = \App\Models\User::all(); 

        // 2. Pasamos la variable 'usuarios' a la vista usando compact()
        return view('admin.dashboard', compact('usuarios'));
    }
    
    // Monitor
    if ($user->role === 'monitor') return view('monitor.dashboard');

    // Usuario  
    $cuotas = \App\Models\Cuota::all(); 
    return view('dashboard', compact('cuotas'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // PERFIL 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ACTIVIDADES
    Route::get('/actividades', function () {
        return view('actividades');
    })->middleware('verified')->name('actividades');

    // Para las cuotas
    Route::get('/tarifas', [CuotaController::class, 'index'])->name('tarifas');
});

Route::get('/planes/todos', [CuotaController::class, 'mostrarTodos'])->name('planes.todos');

require __DIR__.'/auth.php';