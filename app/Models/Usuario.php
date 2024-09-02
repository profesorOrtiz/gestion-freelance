<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Usuario extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Establecer la relación 1 a 1 con el modelo Perfil
    public function perfil(): HasOne {
        return $this->hasOne(Perfil::class);
    }

    // Establecer la relacion 1 a M con el modelo Direccion
    public function direcciones(): HasMany {
        return $this->hasMany(Direccion::class);
    }
}
