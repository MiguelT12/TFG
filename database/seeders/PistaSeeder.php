<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PistaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pistas')->insert([
            ['nombre' => 'Pista Pádel 1', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Pista Pádel 2', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Pista Pádel 3', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}