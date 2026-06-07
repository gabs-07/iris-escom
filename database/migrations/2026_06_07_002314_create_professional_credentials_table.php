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
        Schema::create('professional_credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('professional_id'); // Cédula profesional
            $table->string('specialty_id')->nullable(); // Cédula de especialidad
            $table->string('university'); // Institución licenciatura
            $table->string('postgraduate')->nullable(); // Posgrado/Especialización
            $table->integer('years_of_experience'); // Años de experiencia
            $table->text('professional_associations'); // Asociaciones/colegios
            $table->string('credential_file_path')->nullable(); // Ruta del archivo subido
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Estado
            $table->text('admin_notes')->nullable(); // Notas del admin
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete(); // Admin que revisa
            $table->timestamp('reviewed_at')->nullable(); // Fecha de revisión
            $table->timestamps();
            $table->unique('user_id'); // Un usuario solo puede tener una credencial activa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_credentials');
    }
};
