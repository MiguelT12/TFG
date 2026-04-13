<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuotaController extends Controller
{
    public function mostrarTodos()
    {
        $planes = [
            'bronce' => [
                'nombre' => 'Bronce',
                'precio' => '21.99',
                'lema' => 'Ideal para empezar tu transformación',
                'descripcion' => 'Este plan está diseñado para aquellos que buscan libertad y equipamiento de alta gama sin complicaciones.',
                'caracteristicas' => [
                    'Acceso 24/7 a la sala de fitness',
                    'Uso de vestuarios y taquillas diarias',
                    'App de seguimiento de entrenamientos básica',
                    'Entrada a zona de peso libre y cardio'
                ]
            ],
            'silver' => [
                'nombre' => 'Silver',
                'precio' => '29.99',
                'lema' => 'El equilibrio perfecto entre gimnasio y clases',
                'descripcion' => 'Sube de nivel con acceso a todas nuestras actividades dirigidas por profesionales.',
                'caracteristicas' => [
                    'Todo lo incluido en el Plan Bronce',
                    'Clases colectivas ilimitadas (Zumba, Pilates, Yoga)',
                    'Acceso a la zona de Boxeo',
                    'Descuentos en cafetería y suplementación'
                ]
            ],
            'gold' => [
                'nombre' => 'Gold',
                'precio' => '39.99',
                'lema' => 'La experiencia total de bienestar y rendimiento',
                'descripcion' => 'Para los que no aceptan menos que la excelencia. Incluye servicios premium exclusivos.',
                'caracteristicas' => [
                    'Todo lo incluido en el Plan Silver',
                    'Reserva prioritaria de pistas de pádel',
                    '1 sesión mensual de fisioterapia o masaje',
                    'Asesoramiento nutricional personalizado',
                    'Toalla y taquilla fija incluida'
                ]
            ]
        ];

        return view('plan', compact('planes'));
    }
}