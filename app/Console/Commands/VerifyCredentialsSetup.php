<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class VerifyCredentialsSetup extends Command
{
    protected $signature = 'verify:credentials-setup';
    protected $description = 'Verifica que todo esté configurado correctamente para el sistema de credenciales';

    public function handle()
    {
        $this->info("🔍 Verificando configuración de credenciales profesionales...\n");

        $checks = [
            'Tabla professional_credentials existe' => fn() => Schema::hasTable('professional_credentials'),
            'Columna is_verified_professional en users' => fn() => Schema::hasColumn('users', 'is_verified_professional'),
            'Modelo ProfessionalCredential existe' => fn() => class_exists('App\Models\ProfessionalCredential'),
            'Modelo User tiene relación professionalCredential' => fn() => method_exists('App\Models\User', 'professionalCredential'),
            'Controlador ProfessionalCredentialController existe' => fn() => class_exists('App\Http\Controllers\ProfessionalCredentialController'),
            'Symlink storage en public existe' => fn() => file_exists(public_path('storage')),
            'Carpeta credentials en storage existe' => fn() => is_dir(storage_path('app/public/credentials')),
        ];

        $allPassed = true;
        foreach ($checks as $check => $condition) {
            $result = $condition();
            $status = $result ? '✅' : '❌';
            $this->line("{$status} {$check}");
            if (!$result) $allPassed = false;
        }

        if (!is_dir(storage_path('app/public/credentials'))) {
            $this->warn("\n⚠️  Creando carpeta credentials...");
            mkdir(storage_path('app/public/credentials'), 0755, true);
            $this->info("✅ Carpeta creada en: storage/app/public/credentials");
        }

        $this->newLine();
        if ($allPassed) {
            $this->info("✨ ¡Todo está configurado correctamente!");
        } else {
            $this->error("❌ Hay problemas de configuración. Revisa arriba.");
            return 1;
        }

        return 0;
    }
}
