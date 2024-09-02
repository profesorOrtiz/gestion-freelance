<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';

    protected $guarded = [];

    // Establecer la relacion 1 a 1 con el modelo Usuario
    public function usuario(): BelongsTo {
        return $this->belongsTo(Usuario::class);
    }
}
