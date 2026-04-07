<?php

namespace Database\Seeders;

use App\Models\Pista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PistaSeeder extends Seeder
{
    public function run(): void
    {
        Pista::create(['nombre' => 'Pista de Pádel 1']);
        Pista::create(['nombre' => 'Pista de Pádel 2']);
        Pista::create(['nombre' => 'Pista de Tenis']);
    }
}
