<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'idusuario',
        'idruta',
        'idegreso',
        'valor',
        'nombre',
        'url'    
    ];

    protected $table = 'egresos';
}
