<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CuotaSeeder;
use Database\Seeders\PistaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Administrador
        User::factory()->create([
            'name' => 'Miguel Tejero',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Monitor
        User::factory()->create([
            'name' => 'Monitor',
            'email' => 'monitor@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'monitor',
        ]);

        // Usuario
        User::factory()->create([
            'name' => 'Test Cliente',
            'email' => 'test@ejemplo.com',
            'password' => Hash::make('12345678'),
            'role' => 'usuario',
        ]);

        // Llamamos a los seeders 
        $this->call([
            CuotaSeeder::class,
            ActividadSeeder::class,
            PistaSeeder::class,
            ClaseSeeder::class,
        ]);
    }
}
