<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choferes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'usuario',
        'password',
        'empresa',
        'id_tipo_usuario'
    ];
}
