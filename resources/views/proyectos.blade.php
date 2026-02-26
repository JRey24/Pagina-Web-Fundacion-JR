<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos - Fundación Esperanza Digital</title>
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
        .content{max-width:1000px;margin:20px auto;background:#fff;padding:40px;border-radius:8px;box-shadow:0 2px 4px rgba(0,0,0,0.1)}
        .content h1 {color: #34495e;border-bottom: 2px solid #e0e0e0;padding-bottom: 10px;}
        .card{background:#ecf0f1;padding:20px;border-left:5px solid #1a73e8;border-radius:8px;margin-bottom:15px}
    </style>
</head>
<body>
    <header class="header">
        <a href="/" class="brand-link" aria-label="Ir al inicio">
            <img src="/img/logo.png" width="120" alt="Logo">
            <h1 class="titulo">Fundación Esperanza Digital</h1>
        </a>
        @if(session('usuario_username'))
            <a href="#" class="user-button">{{ session('usuario_username') }}</a>
        @else
            <a href="#" class="user-button">Crear cuenta</a>
        @endif
    </header>
    <nav class="navbar">
        <a href="/">Inicio</a>
        <a href="/sobre-nosotros">Sobre Nosotros</a>
        <a href="/proyectos" class="active">Proyectos</a>
        <a href="/quiero-donar">Quiero donar</a>
        <a href="/contacto">Contacto</a>
        @if(session('usuario_id'))
            @php
                $usuario = \App\Models\Usuario::find(session('usuario_id'));
                if($usuario && $usuario->hasRole('administrador')) {
            @endphp
                    <a href="/usuarios">Usuarios</a>
            @php } @endphp
        @endif
    </nav>
    <main class="content">
        <h1>Nuestros Proyectos</h1>
        <div class="card">
            <h3>Proyecto 1: Sistema Integral de Gestión de Donaciones</h3>
            <p>Implementamos una plataforma que centraliza:</p>
            <p><ul>
                <li>Administración de Donantes.</li>
                <li>Registro de beneficiarios.</li>
                <li>Seguimiento de donaciones en tiempo real.</li>
                <li>Inventarios.</li>
                <li>Distribución con evidencia fotográfica.</li>
                <li>Generación de reportes de impacto social.</li>
            </ul></p>
            <p>Este sistema reduce errores, mejora la entrega de ayudas y garantiza que cada aporte sea utilizado correctamente.</p>
        </div>
        <div class="card">
            <h3>Proyecto 2: Apoyo a Familias en Vulnerabilidad</h3>
            <p>Asignacion inteligente de ayudas según</p>
            <p><ul>
                <li>Nivel de Vulnerabilidad.</li>
                <li>Necesidad registrada.</li>
                <li>Contexto socioeconómico.</li>
            </ul></p>
            <p>En este proyecto priorizamos a quienes más necesitan apoyo real e inmediato.</p>
        </div>
        <div class="card">
            <h3>Proyecto 3: Ruta de Distribución Segura</h3>
            <p>Optimizacion del proceso de entrega:</p>
            <p><ul>
                <li>Asignacion de donaciones.</li>
                <li>Rutas de entrega.</li>
                <li>Registro del responsable.</li>
                <li>Generación con evidencia fotográfica</li>
                <li>Verificación del beneficiario.</li>
            </ul></p>
            <p>Este proyecto garantiza transparencia en en todo el trayecto.</p>
        </div>
        <div class="card">
            <h3>Proyecto 4: Dashboard de Transparencia</h3>
            <p>Implementamos un sistema de reportes y estadísticas que permite</p>
            <p><ul>
                <li>Monitorear donaciones recibidas.</li>
                <li>Consultar beneficiarios activos.</li>
                <li>Revisar inventarios.</li>
                <li>Generar informes fiscales, PDF y Excel.</li>
            </ul></p>
        </div>
    </main>
    @include('partials.floating-donate')
    @include('partials.user-modal')
</body>
</html>