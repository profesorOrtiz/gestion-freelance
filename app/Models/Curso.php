<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Deshabilita protección con la asignación masiva de datos (INSERT y UPDATE)
    protected $guarded = [];
}
