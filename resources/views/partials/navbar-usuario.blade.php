@php
    $usuarioId = session('usuario_id');
    $esAdmin = false;
    if ($usuarioId) {
        $adminRole = \App\Models\rol::where('nombre_rol', 'administrador')->first();
        if ($adminRole) {
            $esAdmin = \App\Models\usuario_rol::where('id_usuario', $usuarioId)
                ->where('id_rol', $adminRole->id_rol)
                ->exists();
        }
    }
@endphp

@if($esAdmin)
    <a href="/usuarios">Usuarios</a>
@endif
