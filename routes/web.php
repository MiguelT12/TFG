<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuotaController;
use App\Models\Cuota;

Route::get('/', function () {
    return view('home');
});

// Dashboard 
Route::get('/dashboard', function () {
    $cuotas = Cuota::all(); 
    
    return view('dashboard', compact('cuotas'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // ADMIN
    Route::get('/admin', function () {
        return "Panel Admin";
    })->middleware('role:admin')->name('admin');

    // MONITOR
    Route::get('/monitor', function () {
        return "Panel Monitor";
    })->middleware('role:monitor')->name('monitor');

    // USUARIO
    Route::get('/usuario', function () {
        return "Panel Usuario";
    })->middleware('role:usuario')->name('usuario');

    // PERFIL 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ACTIVIDADES (Se elimina 'auth' porque ya está dentro del grupo protegido)
    Route::get('/actividades', function () {
        return view('actividades');
    })->middleware('verified')->name('actividades');

    // Para las cuotas
    Route::get('/tarifas', [CuotaController::class, 'index'])->name('tarifas');
});

Route::get('/planes/todos', [CuotaController::class, 'mostrarTodos'])->name('planes.todos');

require __DIR__.'/auth.php';