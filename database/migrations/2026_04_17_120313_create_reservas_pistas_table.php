<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas_pistas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->constrained('users')->cascadeOnDelete();
            $table->foreignId('pista_id')->constrained('pistas')->cascadeOnDelete();
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas_pistas');
    }
};
