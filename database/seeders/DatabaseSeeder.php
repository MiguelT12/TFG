<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CuotaSeeder;
use Database\Seeders\PistaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Si no existe un usuario, lo crea
        if (!User::where('email', 'test@ejemplo.com')->exists()) {
            User::factory()->create([
                'name' => 'Test',
                'email' => 'test@ejemplo.com',
                'role' => 'cliente', 
            ]);
        }

        // Llamamos a los seeders
        $this->call([
            CuotaSeeder::class,
            //PistaSeeder::class,
        ]);
    }
}