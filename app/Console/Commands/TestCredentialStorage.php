<?php

namespace App\Console\Commands;

use App\Models\ProfessionalCredential;
use App\Models\User;
use Illuminate\Console\Command;

class TestCredentialStorage extends Command
{
    protected $signature = 'test:credentials {user_id}';
    protected $description = 'Verifica si las credenciales profesionales se guardaron correctamente';

    public function handle()
    {
        $userId = $this->argument('user_id');
        $user = User::find($userId);

        if (!$user) {
            $this->error("Usuario con ID {$userId} no encontrado.");
            return 1;
        }

        $this->line("Usuario: {$user->name} ({$user->email})");
        $this->line("Rol: {$user->rol}");
        $this->line("is_verified_professional: " . ($user->is_verified_professional ? 'SÍ' : 'NO'));

        $credential = $user->professionalCredential;

        if (!$credential) {
            $this->warn("Este usuario NO tiene credenciales registradas.");
            return 0;
        }

        $this->info("✓ Credenciales encontradas:");
        $this->line("  • Cédula Profesional: {$credential->professional_id}");
        $this->line("  • Cédula Especialidad: {$credential->specialty_id}");
        $this->line("  • Universidad: {$credential->university}");
        $this->line("  • Posgrado: {$credential->postgraduate}");
        $this->line("  • Años de experiencia: {$credential->years_of_experience}");
        $this->line("  • Asociaciones: {$credential->professional_associations}");
        $this->line("  • Archivo: {$credential->credential_file_path}");
        $this->line("  • Estado: {$credential->status}");
        $this->line("  • Creado: {$credential->created_at}");
        $this->line("  • Actualizado: {$credential->updated_at}");

        // Verificar si el archivo existe
        if (\Storage::disk('public')->exists($credential->credential_file_path)) {
            $size = \Storage::disk('public')->size($credential->credential_file_path);
            $this->info("✓ Archivo existe. Tamaño: " . number_format($size / 1024, 2) . " KB");
        } else {
            $this->error("✗ Archivo NO encontrado en: storage/app/public/{$credential->credential_file_path}");
        }

        return 0;
    }
}
