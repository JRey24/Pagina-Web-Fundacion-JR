<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - Fundación Esperanza Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Inter',sans-serif;margin:0;padding:0;background:#f4f7f9}
        .header{background:#fff;padding:15px 30px;border-bottom:1px solid #e0e0e0;display:flex;justify-content:space-between;align-items:center}
        .brand-link{display:flex;align-items:center;gap:12px;text-decoration:none;color:inherit}
        .titulo {font-family: 'Inter', sans-serif;font-size: 2.5em;font-weight: 700;color: #1a73e8;letter-spacing: -0.5px;margin: 0;display: inline-block;}
        .user-button{background:#1a73e8;color:#fff;padding:10px 20px;border-radius:5px;text-decoration:none}
        .navbar{background:#34495e;padding:10px 30px}
        .navbar a{color:#fff;text-decoration:none;padding:10px 15px;margin-right:5px;border-radius:3px}
        .navbar a.active{background:#1a73e8}
        .content{max-width:1200px;margin:20px auto;background:#fff;padding:40px;border-radius:8px;box-shadow:0 2px 4px rgba(0,0,0,0.1)}
        .content h1 {color: #34495e;border-bottom: 2px solid #e0e0e0;padding-bottom: 10px;}
        table{width:100%;border-collapse:collapse;margin:20px 0}
        th,td{padding:12px;text-align:left;border-bottom:1px solid #e0e0e0}
        th{background:#f7fafc;font-weight:700;color:#34495e}
        tr:hover{background:#f5fbf7}
        .badge{display:inline-block;padding:4px 10px;background:#e8f1ff;color:#1a73e8;border-radius:20px;font-size:0.85em;font-weight:600}
        .admin-badge{background:#fff0f0;color:#ff5a5f}
        .info-card{background:#ecf0f1;padding:20px;border-left:5px solid #1a73e8;border-radius:8px;margin-bottom:20px}
    </style>
</head>
<body>
    <header class="header">
        <a href="/" class="brand-link" aria-label="Ir al inicio">
            <img src="/img/logo.png" width="120" alt="Logo">
            <h1 class="titulo">Fundación Esperanza Digital</h1>
        </a>
        <?php if(session('usuario_username')): ?>
            <a href="#" class="user-button"><?php echo e(session('usuario_username')); ?></a>
        <?php else: ?>
            <a href="#" class="user-button">Crear cuenta</a>
        <?php endif; ?>
    </header>
    <nav class="navbar">
        <a href="/">Inicio</a>
        <a href="/sobre-nosotros">Sobre Nosotros</a>
        <a href="/proyectos">Proyectos</a>
        <a href="/quiero-donar">Quiero donar</a>
        <a href="/contacto">Contacto</a>
        <a href="/usuarios" class="active">Usuarios</a>
    </nav>
    <main class="content">
        <h1>Panel de Administrador</h1>
        <div class="info-card">
            <p><b>Bienvenido, <?php echo e(session('usuario_username')); ?></b></p>
            <p>Aquí puedes ver y gestionar todos los usuarios registrados en el sistema.</p>
        </div>

        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $usuarioRoles = \App\Models\usuario_rol::pluck('id_rol', 'id_usuario')->toArray();
                    $rolNames = \App\Models\rol::pluck('nombre_rol', 'id_rol')->toArray();
                ?>
                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $rolId = isset($usuarioRoles[$u->id_usuario]) ? $usuarioRoles[$u->id_usuario] : null;
                        $rol = $rolId ? ($rolNames[$rolId] ?? 'Sin rol') : 'Sin rol';
                    ?>
                    <tr>
                        <td><?php echo e($u->id_usuario); ?></td>
                        <td><?php echo e($u->username); ?></td>
                        <td>
                            <?php if($rol === 'administrador'): ?>
                                <span class="badge admin-badge">Administrador</span>
                            <?php else: ?>
                                <span class="badge">Usuario</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($u->fecha_creacion); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <?php if(count($usuarios) === 0): ?>
            <div class="info-card" style="border-left-color:#ffa500">
                <p>No hay usuarios registrados aún.</p>
            </div>
        <?php endif; ?>
    </main>
    <?php echo $__env->make('partials.floating-donate', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.user-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\fundacion_is\resources\views/mi-cuenta.blade.php ENDPATH**/ ?>