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

    // Activvidades
    Route::get('/actividades', [ActividadController::class, 'index'])
        ->middleware('verified')
        ->name('actividades');

    // Cuotas
    Route::get('/tarifas', [CuotaController::class, 'index'])->name('tarifas');
    Route::post('/tarifas/contratar/{id}', [CuotaController::class, 'contratar'])->name('tarifas.contratar');

    // Admin
    Route::get('/admin/clases-actividades', function (Request $request) {
        $user = $request->user();

        $actividades = \App\Models\Actividad::all();
        $clases = \App\Models\Clase::with(['actividad', 'monitor'])->get();

        return view('admin.clases-actividades', compact('actividades', 'clases'));
    })->name('clases-actividades');

    // Inscripciones
    Route::post('/clases/{id}/apuntarse', [InscripcionController::class, 'apuntarse'])
        ->name('clases.apuntarse');

    Route::delete('/clases/{id}/desapuntarse', [InscripcionController::class, 'desapuntarse'])
        ->name('clases.desapuntarse');

    // Mis clases
    Route::get('/reservas', function () {
        $clases = auth()->user()->clases()->with(['actividad', 'monitor'])->get();
        return view('reservas', compact('clases'));
    })->name('reservas');

    // Calendario 
    Route::get('/calendario', function () {

        $clases = auth()->user()->clases()->with('actividad')->get();

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


});

// Planes
Route::get('/planes/todos', [CuotaController::class, 'mostrarTodos'])->name('planes.todos');

require __DIR__.'/auth.php';