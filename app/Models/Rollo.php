<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rollo extends Model
{
    use HasFactory;

    protected $fillable = [
        'prontuario',
        'nombre',
        'apellido',
        'identificacion',
        'nombrearchivo', // Asegúrate de incluir este campo   
    ];
}