<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class points extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = "points_routes";
    protected $primaryKey = 'id';
    protected $fillable = ['id ', 'id_consecutivo', 'id_routes', 'id_empresa','id_geofence', 'created_at', 'modification_date', 'user_create', 'user_update'];
}
