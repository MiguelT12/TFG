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

        // Administrador 2
        User::factory()->create([
            'name' => 'David Ruiz',
            'email' => 'admin2@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Monitores
        User::factory()->create([
            'name' => 'David Cánovas',
            'email' => 'davidc@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'monitor',
        ]);

        User::factory()->create([
            'name' => 'Samuel Deluque',
            'email' => 'samuel@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'monitor',
        ]);

        User::factory()->create([
            'name' => 'Rubén Doblas',
            'email' => 'ruben@email.com',
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
