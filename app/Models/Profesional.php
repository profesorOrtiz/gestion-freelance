<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    use HasFactory;

    protected $table = "profesionales";

    protected $guarded = [];

    // Establecer una relacion Muchos a Muchos con Tecnologia
    public function tecnologias() {
        return $this->belongsToMany(Tecnologia::class);
    }
}
