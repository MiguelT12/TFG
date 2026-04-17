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
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_actividad')->constrained('actividades')->cascadeOnDelete();
            $table->foreignId('id_monitor')->constrained('users')->cascadeOnDelete();
            $table->time('hora_inicio');
            $table->integer('capacidad');
            $table->string('dia_semana'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
