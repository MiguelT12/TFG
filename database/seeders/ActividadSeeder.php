<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('actividades')->insert([
            ['nombre' => 'Zumba', 'descripcion' => 'Clase de baile aeróbico', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Spinning', 'descripcion' => 'Ciclismo indoor de alta intensidad', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Pilates', 'descripcion' => 'Mejora de la flexibilidad y fuerza', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}