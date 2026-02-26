<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $table = 'rol';
    public $timestamps = false;
    protected $fillable = [
        'id_rol',
        'nombre_rol',
        'descripcion',
    ];
}
