<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{
    use HasFactory;
  
    public $timestamps = false;
    protected $table = "routes";
    protected $primaryKey = 'id';
    protected $fillable = ['id ', 'Name_route', 'description'];
}


