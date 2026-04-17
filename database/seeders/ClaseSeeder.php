<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ClaseSeeder extends Seeder
{
    public function run(): void
    {
        $monitor = User::where('role', 'monitor')->first();

        if ($monitor) {
            DB::table('clases')->insert([
                [
                    'id_actividad' => 1, 
                    'id_monitor' => $monitor->id,
                    'hora_inicio' => '10:00:00',
                    'capacidad' => 20,
                    'dia_semana' => 'Lunes',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id_actividad' => 2, 
                    'id_monitor' => $monitor->id,
                    'hora_inicio' => '18:00:00',
                    'capacidad' => 15,
                    'dia_semana' => 'Miércoles',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }
    }
}
