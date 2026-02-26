<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    public $timestamps = false;
    protected $fillable = [
        'id_usuario',
        'username',
        'password_hash',
        'fecha_creacion',
    ];
    protected $primaryKey = 'id_usuario';
    public $incrementing = false;
    protected $keyType = 'int';

    public function roles()
    {
        return $this->hasMany(usuario_rol::class, 'id_usuario', 'id_usuario');
    }

    public function hasRole($roleName)
    {
        return $this->roles()->whereHas('rol', function($q) use ($roleName) {
            $q->where('nombre_rol', $roleName);
        })->exists();
    }
}

