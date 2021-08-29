<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cost extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "table_cost";
    protected $primaryKey = 'id';
    protected $fillable = ['id ', 'id_routes', 'id_origin', 'id_destination', 'amount'];
}
