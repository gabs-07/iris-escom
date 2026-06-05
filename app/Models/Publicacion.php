<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Publicacion extends Model
{
    use HasFactory;

    // 👇 ESTA LÍNEA ES LA CLAVE
    protected $table = 'publicaciones';

    protected $fillable = [
        'user_id',
        'contenido',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(ComentarioPublicacion::class)->oldest('id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PublicacionLike::class);
    }
}