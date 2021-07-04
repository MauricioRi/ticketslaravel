<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geocerca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'datos',
        'empresa',      
    ];
}
