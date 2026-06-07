<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'apellidos', 'email', 'password', 'rol', 'is_verified_professional', 'fecha_nacimiento', 'genero', 'telefono', 'emergencia_nombre', 'emergencia_relacion', 'emergencia_telefono'])]
#[Hidden(['password', 'remember_token'])]

class User extends Authenticatable implements MustVerifyEmail

{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function diarios(): HasMany
    {
        return $this->hasMany(Diario::class);
    }

    public function chatsIniciados(): HasMany
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }

    public function chatsRecibidos(): HasMany
    {
        return $this->hasMany(Chat::class, 'recipient_id');
    }

    public function mensajes(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function publicaciones(): HasMany
    {
        return $this->hasMany(Publicacion::class);
    }

    public function comentariosPublicaciones(): HasMany
    {
        return $this->hasMany(ComentarioPublicacion::class);
    }

    public function professionalCredential(): HasOne
    {
        return $this->hasOne(ProfessionalCredential::class);
    }

    // Relaciones para doctores (psicólogos/psiquiatras)
    public function patients(): HasMany
    {
        return $this->hasMany(DoctorPatient::class, 'doctor_id')
            ->where('status', 'accepted');
    }

    public function pendingPatientRequests(): HasMany
    {
        return $this->hasMany(DoctorPatient::class, 'doctor_id')
            ->where('status', 'pending');
    }

    // Relaciones para pacientes
    public function doctors(): HasMany
    {
        return $this->hasMany(DoctorPatient::class, 'patient_id')
            ->where('status', 'accepted');
    }

    public function pendingDoctorRequests(): HasMany
    {
        return $this->hasMany(DoctorPatient::class, 'patient_id')
            ->where('status', 'pending');
    }
}
