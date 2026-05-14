<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ClaseSeeder extends Seeder
{
    public function run(): void
    {
        $David = User::where('email', 'davidc@email.com')->first();
        $Samuel = User::where('email', 'samuel@email.com')->first();
        $Ruben = User::where('email', 'ruben@email.com')->first();
        $Guillermo = User::where('email', 'guillermo@email.com')->first();

        DB::table('clases')->insert([
            // Profesor: David Cánovas - Cardio y Ritmo
            ['id_actividad' => 1, 'id_monitor' => $David->id, 'hora_inicio' => '10:00:00', 'capacidad' => 20, 'dia_semana' => 'Lunes', 'created_at' => now(), 'updated_at' => now()],
            ['id_actividad' => 1, 'id_monitor' => $David->id, 'hora_inicio' => '16:00:00', 'capacidad' => 20, 'dia_semana' => 'Lunes', 'created_at' => now(), 'updated_at' => now()],

            ['id_actividad' => 2, 'id_monitor' => $David->id, 'hora_inicio' => '18:30:00', 'capacidad' => 25, 'dia_semana' => 'Miércoles', 'created_at' => now(), 'updated_at' => now()],
            ['id_actividad' => 2, 'id_monitor' => $David->id, 'hora_inicio' => '12:30:00', 'capacidad' => 25, 'dia_semana' => 'Miércoles', 'created_at' => now(), 'updated_at' => now()],

            // Profesor: Samuel Deluque - Bienestar y Flexibilidad
            ['id_actividad' => 6, 'id_monitor' => $Samuel->id, 'hora_inicio' => '09:00:00', 'capacidad' => 15, 'dia_semana' => 'Martes', 'created_at' => now(), 'updated_at' => now()],
            ['id_actividad' => 6, 'id_monitor' => $Samuel->id, 'hora_inicio' => '17:30:00', 'capacidad' => 15, 'dia_semana' => 'Martes', 'created_at' => now(), 'updated_at' => now()],

            ['id_actividad' => 3, 'id_monitor' => $Samuel->id, 'hora_inicio' => '11:30:00', 'capacidad' => 20, 'dia_semana' => 'Jueves', 'created_at' => now(), 'updated_at' => now()],
            ['id_actividad' => 3, 'id_monitor' => $Samuel->id, 'hora_inicio' => '19:00:00', 'capacidad' => 20, 'dia_semana' => 'Jueves', 'created_at' => now(), 'updated_at' => now()],
            
            // Profesor: Rubén Doblas - Fuerza y Musculación
            ['id_actividad' => 4, 'id_monitor' => $Ruben->id, 'hora_inicio' => '9:30:00', 'capacidad' => 20, 'dia_semana' => 'Lunes', 'created_at' => now(), 'updated_at' => now()],
            ['id_actividad' => 4, 'id_monitor' => $Ruben->id, 'hora_inicio' => '13:00:00', 'capacidad' => 20, 'dia_semana' => 'Lunes', 'created_at' => now(), 'updated_at' => now()],

            ['id_actividad' => 5, 'id_monitor' => $Ruben->id, 'hora_inicio' => '12:00:00', 'capacidad' => 12, 'dia_semana' => 'Viernes', 'created_at' => now(), 'updated_at' => now()],
            ['id_actividad' => 5, 'id_monitor' => $Ruben->id, 'hora_inicio' => '20:30:00', 'capacidad' => 12, 'dia_semana' => 'Viernes', 'created_at' => now(), 'updated_at' => now()],

            // Profesor: Guillermo Díaz - Contacto y Alta Intensidad
            ['id_actividad' => 7, 'id_monitor' => $Guillermo->id, 'hora_inicio' => '20:00:00', 'capacidad' => 15, 'dia_semana' => 'Martes', 'created_at' => now(), 'updated_at' => now()],
            ['id_actividad' => 7, 'id_monitor' => $Guillermo->id, 'hora_inicio' => '15:00:00', 'capacidad' => 15, 'dia_semana' => 'Martes', 'created_at' => now(), 'updated_at' => now()],
            ['id_actividad' => 7, 'id_monitor' => $Guillermo->id, 'hora_inicio' => '10:00:00', 'capacidad' => 15, 'dia_semana' => 'Martes', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}