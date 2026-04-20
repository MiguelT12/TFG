<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cuotas', function (Blueprint $table) {
            $table->string('lema')->nullable();
            $table->text('descripcion')->nullable();
            $table->json('caracteristicas')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cuotas', function (Blueprint $table) {
            $table->dropColumn(['lema', 'descripcion', 'caracteristicas']);
        });
    }
};
