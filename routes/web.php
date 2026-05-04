<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\PistaController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

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
        $clases = \App\Models\Clase::with('actividad')
            ->where('id_monitor', $user->id)
            ->get();

        return view('monitor.dashboard', compact('clases'));
    }

    // Usuario
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

    // Aactividades
    Route::get('/actividades', [ActividadController::class, 'index'])
        ->middleware('verified')
        ->name('actividades');

    Route::post('/admin/actividades', [ActividadController::class, 'store'])->name('admin.actividades.store');
    Route::get('/admin/actividades/{id}/edit', [ActividadController::class, 'edit'])->name('admin.actividades.edit');
    Route::put('/admin/actividades/{id}', [ActividadController::class, 'update'])->name('admin.actividades.update');
    Route::delete('/admin/actividades/{id}', [ActividadController::class, 'destroy'])->name('admin.actividades.destroy');

    // Clases
    Route::post('/admin/clases', [ClaseController::class, 'store'])->name('admin.clases.store');
    Route::get('/admin/clases/{id}/edit', [ClaseController::class, 'edit'])->name('admin.clases.edit');
    Route::put('/admin/clases/{id}', [ClaseController::class, 'update'])->name('admin.clases.update');
    Route::delete('/admin/clases/{id}', [ClaseController::class, 'destroy'])->name('admin.clases.destroy');

    // Monitor, ver alumnos
    Route::get('/monitor/clase/{id}/alumnos', [MonitorController::class, 'verAlumnos'])
        ->name('monitor.alumnos');

    // Monitor, eliminar alumnos
    Route::delete('/monitor/clase/{clase}/usuario/{usuario}', [MonitorController::class, 'eliminarAlumno'])
        ->name('monitor.eliminarAlumno');

    // Cuotas
    Route::get('/tarifas', [CuotaController::class, 'index'])->name('tarifas');
    Route::get('/tarifas/confirmar/{id}', [CuotaController::class, 'confirmar'])->name('tarifas.confirmar');
    Route::post('/tarifas/contratar/{id}', [CuotaController::class, 'contratar'])->name('tarifas.contratar');

    // Panel de administración
    Route::get('/admin/clases-actividades', function (Request $request) {

        $actividades = \App\Models\Actividad::all();
        $clases = \App\Models\Clase::with(['actividad', 'monitor'])->get();
        $monitores = \App\Models\User::where('role', 'monitor')->get();

        return view('admin.clases-actividades', compact('actividades', 'clases', 'monitores'));

    })->name('clases-actividades');

    // Gestión de usuarios desde Admin
    Route::get('/admin/usuarios/nuevo', [AdminController::class, 'nuevoUsuario'])->name('admin.usuarios.nuevo');
    Route::post('/admin/usuarios/guardar', [AdminController::class, 'guardarUsuario'])->name('admin.usuarios.guardar');
    Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\AdminController::class, 'eliminarUsuario'])->name('admin.usuarios.eliminar');

    Route::get('/admin/reservas-pistas', [AdminController::class, 'reservasPistas'])->name('admin.reservas.pistas');

    // Inscripciones
    Route::post('/clases/{id}/apuntarse', [InscripcionController::class, 'apuntarse'])
        ->name('clases.apuntarse');

    Route::delete('/clases/{id}/desapuntarse', [InscripcionController::class, 'desapuntarse'])
        ->name('clases.desapuntarse');

    // Reservas
    Route::get('/reservas', function (Request $request) {

        /** @var \App\Models\User $user */
        $user = $request->user();

        $clases = $user->clases()->with(['actividad', 'monitor'])->get();

        return view('reservas', compact('clases'));

    })->name('reservas');

    // Calendario 
    Route::get('/calendario', function (Request $request) {

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

                'extendedProps' => [
                    'actividad_id' => $clase->actividad->id,
                ],
            ];
        });

        return view('calendario', compact('eventos'));

    })->name('calendario');

    // Pistas
    Route::get('/pistas', [PistaController::class, 'index'])->name('pistas.index');
    Route::post('/pistas/reservar', [PistaController::class, 'reservar'])->name('pistas.reservar');
    Route::delete('/pistas/cancelar/{id}', [PistaController::class, 'cancelar'])->name('pistas.cancelar');

    Route::get('/admin/gestion-pistas', [PistaController::class, 'adminIndex'])->name('admin.pistas');
    Route::post('/admin/pistas', [PistaController::class, 'store'])->name('admin.pistas.store');
    Route::get('/admin/pistas/{id}/edit', [PistaController::class, 'edit'])->name('admin.pistas.edit');
    Route::put('/admin/pistas/{id}', [PistaController::class, 'update'])->name('admin.pistas.update');
    Route::delete('/admin/pistas/{id}', [PistaController::class, 'destroy'])->name('admin.pistas.destroy');

    // Calendario de monitores
    Route::get('/monitor/calendario', [MonitorController::class, 'calendario'])
    ->name('monitor.calendario');
});

// Planes
Route::get('/tarifas', [CuotaController::class, 'mostrarTodos'])->name('planes.todos');

require __DIR__.'/auth.php';