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
    Schema::table('alojamientos', function (Blueprint $table) {
        $table->boolean('activo')->default(true)->after('precio_por_noche');
        $table->boolean('destacado')->default(false)->after('activo');
    });
}

public function down(): void
{
    Schema::table('alojamientos', function (Blueprint $table) {
        $table->dropColumn(['activo', 'destacado']);
    });
}
};
