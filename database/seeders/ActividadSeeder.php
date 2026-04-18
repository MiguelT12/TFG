<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeeder extends Seeder
{
    public function run(): void
    {
       DB::table('actividades')->insert([
    [
        'id'          => 1,
        'nombre'      => 'Zumba',
        'descripcion' => 'Clase de baile aeróbico',
        'created_at'  => now(),
        'updated_at'  => now()
    ],
    [
        'id'          => 2,
        'nombre'      => 'Spinning',
        'descripcion' => 'Ciclismo indoor de alta intensidad',
        'created_at'  => now(),
        'updated_at'  => now()
    ],
    [
        'id'          => 3,
        'nombre'      => 'Pilates',
        'descripcion' => 'Mejora de la flexibilidad y fuerza',
        'created_at'  => now(),
        'updated_at'  => now()
    ],
    [
        'id'          => 4,
        'nombre'      => 'BodyPump',
        'descripcion' => 'Entrenamiento con barras y discos al ritmo de la música.',
        'created_at'  => now(),
        'updated_at'  => now()
    ],
    [
        'id'          => 5,
        'nombre'      => 'CrossFit',
        'descripcion' => 'Entrenamiento funcional de alta intensidad.',
        'created_at'  => now(),
        'updated_at'  => now()
    ],
    [
        'id'          => 6,
        'nombre'      => 'Yoga',
        'descripcion' => 'Conexión cuerpo y mente a través de posturas y respiración.',
        'created_at'  => now(),
        'updated_at'  => now()
    ],
    [
        'id'          => 7,
        'nombre'      => 'Boxeo',
        'descripcion' => 'Acondicionamiento físico basado en técnicas de boxeo.',
        'created_at'  => now(),
        'updated_at'  => now()
    ],
]);
    }
}