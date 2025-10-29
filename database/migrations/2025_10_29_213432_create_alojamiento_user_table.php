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
        Schema::create('alojamiento_user', function (Blueprint $table) {
        // No necesitamos 'id' ni 'timestamps' para esta tabla simple

        // Columna para el ID del usuario
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // Columna para el ID del alojamiento
        $table->foreignId('alojamiento_id')->constrained()->onDelete('cascade');

        // Definimos la clave primaria compuesta para evitar duplicados
        $table->primary(['user_id', 'alojamiento_id']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alojamiento_user');
    }
};
