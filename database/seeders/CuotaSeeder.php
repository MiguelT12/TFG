<?php

namespace Database\Seeders;

use App\Models\Cuota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuotaSeeder extends Seeder
{
    public function run(): void
    {
        Cuota::create(['nombre' => 'Bronce', 'precio' => 21.99]);
        Cuota::create(['nombre' => 'Silver', 'precio' => 29.99]);
        Cuota::create(['nombre' => 'Gold', 'precio' => 36.99]);
    }
}