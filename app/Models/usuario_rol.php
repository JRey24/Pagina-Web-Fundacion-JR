<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario_rol extends Model
{
    protected $table = 'usuario_rol';
    public $timestamps = false;
    protected $fillable = [
        'id_usuario_rol',
        'id_usuario',
        'id_rol',
    ];
    
    public function rol()
    {
        return $this->belongsTo(\App\Models\rol::class, 'id_rol', 'id_rol');
    }

}
