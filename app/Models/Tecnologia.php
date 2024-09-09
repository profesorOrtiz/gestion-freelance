<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    // Establecer una relación Muchos a Muchos con Profesional
    public function profesionales() {
        return $this->belongsToMany(Profesional::class);
    }
}
