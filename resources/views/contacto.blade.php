<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Fundación Esperanza Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Inter',sans-serif;margin:0;padding:0;background:#f4f7f9}
        .header{background:#fff;padding:15px 30px;border-bottom:1px solid #e0e0e0;display:flex;justify-content:space-between;align-items:center}
        .titulo {font-family: 'Inter', sans-serif;font-size: 2.5em;font-weight: 700;color: #1a73e8;letter-spacing: -0.5px;margin: 0;display: inline-block;}
        .user-button{background:#1a73e8;color:#fff;padding:10px 20px;border-radius:5px;text-decoration:none}
        .navbar{background:#34495e;padding:10px 30px}
        .navbar a{color:#fff;text-decoration:none;padding:10px 15px;margin-right:5px;border-radius:3px}
        .navbar a.active{background:#1a73e8}
        .content{max-width:1000px;margin:20px auto;background:#fff;padding:40px;border-radius:8px;box-shadow:0 2px 4px rgba(0,0,0,0.1)}
        .content h1 {color: #34495e;border-bottom: 2px solid #e0e0e0;padding-bottom: 10px;}
        .form-group{margin-bottom:15px}
        input,textarea{width:100%;padding:10px;border:1px solid #e0e0e0;border-radius:5px}
        .submit{background:#1a73e8;color:#fff;padding:12px 20px;border:none;border-radius:5px;cursor:pointer}
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
        <a href="/proyectos">Proyectos</a>
        <a href="/quiero-donar">Quiero donar</a>
        <a href="/contacto" class="active">Contacto</a>
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
        <h1>Contacto</h1>
        <div class="card">
            <h3>¿Deseas donar, ser voluntario o recibir información de nuestros proyectos?</h3>
            <h2>Información de Contacto</h2>
            <p><b>📍 Dirección:</b> Carrera 73A No. 81B – 70., Bogotá D.C, Colombia</p>
            <p><b>📞 Teléfono:</b> +57 322 392 9037</p>
            <p><b>📧 Email:</b>Juan.rey-mo@uniminuto.edu.co</p>
            <p><b>🕒 Horario:</b> Lunes a Viernes: 8:00 a.m. a 5:00 p.m.</p>
        </div>
        <p>Escríbenos un mensaje y te responderemos pronto.</p>
        <form method="POST" action="#">
            <div class="form-group"><label>Nombre</label><input type="text" required></div>
            <div class="form-group"><label>Email</label><input type="email" required></div>
            <div class="form-group"><label>Mensaje</label><textarea required></textarea></div>
            <button class="submit">Enviar</button>
        </form>
    </main>
    @include('partials.floating-donate')
    @include('partials.user-modal')
</body>
</html>