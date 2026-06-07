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
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellidos')->nullable()->after('name');
            $table->date('fecha_nacimiento')->nullable()->after('apellidos');
            $table->enum('genero', ['femenino', 'masculino', 'no-binario', 'prefiero-no-decir', 'otro'])->nullable()->after('fecha_nacimiento');
            $table->string('telefono')->nullable()->after('genero');
            $table->string('emergencia_nombre')->nullable()->after('telefono');
            $table->string('emergencia_relacion')->nullable()->after('emergencia_nombre');
            $table->string('emergencia_telefono')->nullable()->after('emergencia_relacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'apellidos',
                'fecha_nacimiento',
                'genero',
                'telefono',
                'emergencia_nombre',
                'emergencia_relacion',
                'emergencia_telefono'
            ]);
        });
    }
};
