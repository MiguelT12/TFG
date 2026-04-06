<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Dashboard general (usuario normal)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// RUTAS PROTEGIDAS POR ROL
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


    // PERFIL (común para todos)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';