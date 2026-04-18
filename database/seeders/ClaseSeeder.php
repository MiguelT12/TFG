<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ClaseSeeder extends Seeder
{
    public function run(): void
    {
        $monitorZumba = User::where('email', 'davidc@email.com')->first();
        $monitorYoga = User::where('email', 'samuel@email.com')->first();
        $monitor = User::where('role', 'monitor')->first();

        if ($monitor) {
            DB::table('clases')->insert([
                [
                    'id_actividad' => 1, 
                    'id_monitor' => $monitorZumba->id,
                    'hora_inicio' => '10:00:00',
                    'capacidad' => 20,
                    'dia_semana' => 'Lunes',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id_actividad' => 2, 
                    'id_monitor' => $monitorYoga->id,
                    'hora_inicio' => '18:00:00',
                    'capacidad' => 15,
                    'dia_semana' => 'Miércoles',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id_actividad' => 4, 
                    'id_monitor' => $monitor->id, 
                    'hora_inicio' => '10:00:00', 
                    'capacidad' => 20, 
                    'dia_semana' => 'Martes', 
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
                [
                    'id_actividad' => 4, 
                    'id_monitor' => $monitor->id, 
                    'hora_inicio' => '19:00:00', 
                    'capacidad' => 25, 
                    'dia_semana' => 'Martes', 
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
                [
                    'id_actividad' => 5, 
                    'id_monitor' => $monitor->id, 
                    'hora_inicio' => '08:00:00',
                    'capacidad' => 12, 
                    'dia_semana' => 'Jueves', 
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
                [
                    'id_actividad' => 6, 
                    'id_monitor' => $monitor->id, 
                    'hora_inicio' => '09:00:00', 
                    'capacidad' => 20, 
                    'dia_semana' => 'Viernes', 
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
                [
                    'id_actividad' => 7, 
                    'id_monitor' => $monitor->id, 
                    'hora_inicio' => '20:00:00', 
                    'capacidad' => 16, 
                    'dia_semana' => 'Lunes', 
                    'created_at' => now(), 
                    'updated_at' => now()
                ],
            ]);
        }
    }
}
