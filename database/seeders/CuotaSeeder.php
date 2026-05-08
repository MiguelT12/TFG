<?php

namespace Database\Seeders;

use App\Models\Cuota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuotaSeeder extends Seeder
{
    public function run(): void
    {
        Cuota::truncate();

        Cuota::create([
            'nombre' => 'Bronce',
            'lema' => 'Ideal para padawans novatos',
            'precio' => 21.99,
            'descripcion' => 'Este plan está diseñado para aquellos que acaban de aterrizar en Tatooine y quieran avanzar en su viaje Jedi.',
            'caracteristicas' => [
                'Acceso 24/7 a sala fitness',
                'Uso de vestuarios libres', 
                'Acceso a clases grupales'
            ]
        ]);

        Cuota::create([
            'nombre' => 'Plata',
            'lema' => 'Que el cardio te acompañe',
            'precio' => 29.99,
            'descripcion' => 'Perfecto para quienes necesitan clases dirigidas por el mismísimo Maestro Yoda y un entrenamiento estructurado capaz de destruir la Estrella de la Muerte.',
            'caracteristicas' => [
                'Acceso 24/7 a sala fitness',
                'Uso de vestuarios libres',
                'Acceso a clases grupales',
                'Regalo de bienvenida (toalla y botella de agua)',
                'Acceso a piscina'
            ]
        ]);

        Cuota::create([
            'nombre' => 'Oro',
            'lema' => 'Únete al Lado Oscuro del fitness',
            'precio' => 36.99,
            'descripcion' => 'El paquete definitivo del Imperio. Acceso total a todas las instalaciones, pistas para aparcar tu Halcón Milenario y ¡poder ilimitado! para tus bíceps.',
            'caracteristicas' => [
                'Acceso 24/7 a sala fitness',
                'Uso de vestuarios libres',
                'Taquilla privada',
                'Acceso a piscina',
                'Regalo de bienvenida (toalla, botella de agua y camiseta)',
                'Reserva de pistas sin coste adicional',
            ]
        ]);
    }
}