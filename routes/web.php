<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuotaController;

// HOME
Route::get('/', function () {
    return view('home');
});

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// RUTAS PROTEGIDAS
Route::middleware(['auth'])->group(function () {

    Route::get('/admin', function () {
        return "Panel Admin";
    })->middleware('role:admin')->name('admin');

    Route::get('/monitor', function () {
        return "Panel Monitor";
    })->middleware('role:monitor')->name('monitor');

    Route::get('/usuario', function () {
        return "Panel Usuario";
    })->middleware('role:usuario')->name('usuario');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/actividades', function () {
        return view('actividades');
    })->middleware(['verified'])->name('actividades');

    Route::get('/tarifas', [CuotaController::class, 'index'])->name('tarifas');
});


//  PLANES POR TIPO
Route::get('/planes/{tipo}', function ($tipo) {

    $planes = [
        'bronce' => [
            'nombre' => 'Bronce',
            'precio' => '21.99€',
            'descripcion' => 'Acceso completo a sala fitness',
            'incluye' => [
                'Acceso completo a la sala fitness',
                'Zona de máquinas de musculación',
                'Zona de peso libre (mancuernas, barras, discos)',
                'Zona de cardio (cintas, bicicletas, elípticas)',
                'Zona de entrenamiento funcional',
                'Uso ilimitado de todas las máquinas',
                'Acceso a vestuarios y duchas'
            ]
        ],
                'silver' => [
            'nombre' => 'Silver',
            'precio' => '29.99€',
            'descripcion' => 'Acceso a sala Fitness + actividades colectivas',
            'incluye' => [
                'Acceso completo a la sala fitness',
                'Zona de musculación y peso libre',
                'Zona de cardio y entrenamiento funcional',
                'Horario libre de entrenamiento',
                'Zumba',
                'Pilates',
                'Body Pump',
                'GAP (glúteo, abdomen y pierna)',
                'Spinning / Ciclo indoor',
                'Entrenamiento funcional en grupo',
                'Acceso a vestuarios y duchas'
            ]
        ],
            'gold' => [
            'nombre' => 'Gold',
            'precio' => '39.99€',
            'descripcion' => 'Fitness + actividades + pádel',
            'incluye' => [
                'Acceso completo a la sala fitness',
                'Zona de musculación y peso libre',
                'Zona de cardio y entrenamiento funcional',
                'Acceso a todas las clases colectivas',

                '--- Servicios premium ---',

                'Reserva de pistas de pádel',
                'Entrenamientos individuales',
                'Asesoramiento nutricional básico',
                '1 sesión mensual con entrenador personal',

                'Acceso a vestuarios y duchas'
            ]
        ],
    ];

    if (!array_key_exists($tipo, $planes)) {
        abort(404);
    }

    return view('plan', ['plan' => $planes[$tipo]]);

})->name('plan.show');

require __DIR__.'/auth.php';