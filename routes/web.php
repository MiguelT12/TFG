<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\ActividadController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

// Dashboard 
Route::get('/dashboard', function (Request $request) {
    /** @var \App\Models\User $user */
    $user = $request->user();

    // Administrador
    if ($user->role === 'admin') {
        $usuarios = \App\Models\User::all(); 
        $actividades = \App\Models\Actividad::all();
        $clases = \App\Models\Clase::with(['actividad', 'monitor'])->get();

        return view('admin.dashboard', compact('usuarios', 'actividades', 'clases'));
    }
    
    // Monitor
    if ($user->role === 'monitor') {
        $clases = \App\Models\Clase::with('actividad')->where('id_monitor', $user->id)->get();
        return view('monitor.dashboard', compact('clases'));
    }

    // Usuario 
    if (is_null($user->id_cuota)) {
        return redirect()->route('tarifas'); 
    }

    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // PERFIL 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cuenta', function () {
        return view('cuenta');
    })->name('cuenta');

    // ACTIVIDADES
    Route::get('/actividades', [ActividadController::class, 'index'])->middleware('verified')->name('actividades');

    // Para las cuotas
    Route::get('/tarifas', [CuotaController::class, 'index'])->name('tarifas');
    Route::post('/tarifas/contratar/{id}', [CuotaController::class, 'contratar'])->name('tarifas.contratar');

    // Clases y Actividades Admin
    Route::get('/admin/clases-actividades', function (Request $request) {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $actividades = \App\Models\Actividad::all();
        $clases = \App\Models\Clase::with(['actividad', 'monitor'])->get();

        return view('admin.clases-actividades', compact('actividades', 'clases'));
    })->name('clases-actividades');
});

Route::get('/planes/todos', [CuotaController::class, 'mostrarTodos'])->name('planes.todos');

require __DIR__.'/auth.php';