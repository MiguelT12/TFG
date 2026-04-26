<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\ActividadController;
use Illuminate\Http\Request;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\PistaController;

Route::get('/', function () {
    return redirect()->route('dashboard');
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

    $cuotas = \App\Models\Cuota::all();
    return view('dashboard', compact('cuotas'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cuenta', function () {
        return view('cuenta');
    })->name('cuenta');

    // Actividades
    Route::get('/actividades', [ActividadController::class, 'index'])
        ->middleware('verified')
        ->name('actividades');
    
    // Actividades
    Route::post('/admin/actividades', [App\Http\Controllers\ActividadController::class, 'store'])->name('admin.actividades.store');
    Route::get('/admin/actividades/{id}/edit', [App\Http\Controllers\ActividadController::class, 'edit'])->name('admin.actividades.edit');
    Route::put('/admin/actividades/{id}', [App\Http\Controllers\ActividadController::class, 'update'])->name('admin.actividades.update');
    Route::delete('/admin/actividades/{id}', [App\Http\Controllers\ActividadController::class, 'destroy'])->name('admin.actividades.destroy');

    // Clases
    Route::post('/admin/clases', [App\Http\Controllers\ClaseController::class, 'store'])->name('admin.clases.store');
    Route::get('/admin/clases/{id}/edit', [App\Http\Controllers\ClaseController::class, 'edit'])->name('admin.clases.edit');
    Route::put('/admin/clases/{id}', [App\Http\Controllers\ClaseController::class, 'update'])->name('admin.clases.update');
    Route::delete('/admin/clases/{id}', [App\Http\Controllers\ClaseController::class, 'destroy'])->name('admin.clases.destroy');

    // Clases
    Route::post('/admin/clases', [App\Http\Controllers\ClaseController::class, 'store'])->name('admin.clases.store');
    Route::delete('/admin/clases/{id}', [App\Http\Controllers\ClaseController::class, 'destroy'])->name('admin.clases.destroy');
    Route::get('/admin/clases/{id}/edit', [App\Http\Controllers\ClaseController::class, 'edit'])->name('admin.clases.edit');
    Route::put('/admin/clases/{id}', [App\Http\Controllers\ClaseController::class, 'update'])->name('admin.clases.update');

    // Cuotas
    Route::get('/tarifas', [CuotaController::class, 'index'])->name('tarifas');
    Route::post('/tarifas/contratar/{id}', [CuotaController::class, 'contratar'])->name('tarifas.contratar');

    // Admin
    Route::get('/admin/clases-actividades', function (Request $request) {
        $user = $request->user();

        $actividades = \App\Models\Actividad::all();
        $clases = \App\Models\Clase::with(['actividad', 'monitor'])->get();
        $monitores = \App\Models\User::where('role', 'monitor')->get(); // Necesario para el modal

        return view('admin.clases-actividades', compact('actividades', 'clases', 'monitores'));
    })->name('clases-actividades');

    // Inscripciones
    Route::post('/clases/{id}/apuntarse', [InscripcionController::class, 'apuntarse'])
        ->name('clases.apuntarse');

    Route::delete('/clases/{id}/desapuntarse', [InscripcionController::class, 'desapuntarse'])
        ->name('clases.desapuntarse');

    // Mis clases
    Route::get('/reservas', function (\Illuminate\Http\Request $request) {
        /** @var \App\Models\User $user */
        $user = $request->user();
        
        $clases = $user->clases()->with(['actividad', 'monitor'])->get();
        return view('reservas', compact('clases'));
    })->name('reservas');

    // Calendario 
    Route::get('/calendario', function (\Illuminate\Http\Request $request) {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $clases = $user->clases()->with('actividad')->get();

        $dias = [
            'Lunes' => 'Monday',
            'Martes' => 'Tuesday',
            'Miercoles' => 'Wednesday',
            'Miércoles' => 'Wednesday',
            'Jueves' => 'Thursday',
            'Viernes' => 'Friday',
            'Sabado' => 'Saturday',
            'Sábado' => 'Saturday',
            'Domingo' => 'Sunday',
        ];

        $eventos = $clases->map(function ($clase) use ($dias) {

            $diaIngles = $dias[$clase->dia_semana] ?? 'Monday';

            return [
                'title' => $clase->actividad->nombre,
                'start' => now()
                    ->next($diaIngles)
                    ->setTimeFromTimeString($clase->hora_inicio),
            ];
        });

        return view('calendario', compact('eventos'));

    })->name('calendario');


    // Pistas
    Route::get('/pistas', [PistaController::class, 'index'])->name('pistas.index');
    Route::post('/pistas/reservar', [PistaController::class, 'reservar'])->name('pistas.reservar');
    Route::delete('/pistas/cancelar/{id}', [PistaController::class, 'cancelar'])->name('pistas.cancelar');

    Route::get('/admin/gestion-pistas', [App\Http\Controllers\PistaController::class, 'adminIndex'])->name('admin.pistas');
    Route::post('/admin/pistas', [App\Http\Controllers\PistaController::class, 'store'])->name('admin.pistas.store');
    Route::get('/admin/pistas/{id}/edit', [App\Http\Controllers\PistaController::class, 'edit'])->name('admin.pistas.edit');
    Route::put('/admin/pistas/{id}', [App\Http\Controllers\PistaController::class, 'update'])->name('admin.pistas.update');
    Route::delete('/admin/pistas/{id}', [App\Http\Controllers\PistaController::class, 'destroy'])->name('admin.pistas.destroy');
});

// Planes
Route::get('/planes/todos', [CuotaController::class, 'mostrarTodos'])->name('planes.todos');

require __DIR__.'/auth.php';