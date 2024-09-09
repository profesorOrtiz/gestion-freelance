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
        Schema::create('profesional_tecnologia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesional_id'); // -> Campo id Tabla profesionales
            $table->foreignId('tecnologia_id'); // -> Campo id Tabla tecnologias
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesional_tecnologia');
    }
};
