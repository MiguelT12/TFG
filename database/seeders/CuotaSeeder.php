<?php

namespace Database\Seeders;

use App\Models\Cuota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuotaSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiamos la tabla para no duplicar datos si lo ejecutas varias veces
        Cuota::truncate();

        Cuota::create([
            'nombre' => 'Bronce',
            'lema' => 'Ideal para empezar tu transformación',
            'precio' => 21.99,
            'descripcion' => 'Este plan está diseñado para aquellos que buscan libertad y equipamiento de alta gama sin complicaciones.',
            'caracteristicas' => [
                'Acceso 24/7 a la sala',
                'Uso de vestuarios libres'
            ]
        ]);

        Cuota::create([
            'nombre' => 'Plata',
            'lema' => 'Sube de nivel tu entrenamiento',
            'precio' => 29.99,
            'descripcion' => 'Perfecto para quienes necesitan acceso a clases dirigidas y un seguimiento más estructurado.',
            'caracteristicas' => [
                'Acceso 24/7 a la sala',
                'Uso de vestuarios',
                'Acceso a clases grupales (Spinning, BodyPump)',
                '1 reserva de pista a la semana'
            ]
        ]);

        Cuota::create([
            'nombre' => 'Oro',
            'lema' => 'Domina la galaxia',
            'precio' => 36.99,
            'descripcion' => 'El paquete definitivo. Acceso total a todas las instalaciones, pistas y asesoramiento personalizado.',
            'caracteristicas' => [
                'Acceso 24/7 a la sala',
                'Taquilla privada',
                'Clases grupales ilimitadas',
                'Reservas de pistas ilimitadas',
                'Entrenador personal 1 vez al mes'
            ]
        ]);
    }
}