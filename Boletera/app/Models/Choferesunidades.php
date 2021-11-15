<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choferesunidades extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'idchofer',
        'idunidad',
    ];

    protected $table='choferesunidades';
}
