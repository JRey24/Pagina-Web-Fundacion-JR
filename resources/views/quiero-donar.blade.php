<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiero donar - Fundación Esperanza Digital</title>
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
        .donation-card{background:#ecf0f1;padding:20px;border-left:5px solid #1a73e8;border-radius:8px;margin-bottom:15px}
        .donation-types{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;margin:20px 0}
        .donation-box{background:#fff;border:2px solid #1a73e8;padding:20px;border-radius:8px;text-align:center;cursor:pointer;transition:all 0.3s}
        .donation-box:hover{background:#e8f1ff;box-shadow:0 4px 8px rgba(26,115,232,0.2)}
        .donation-box h3{color:#1a73e8;margin-top:0}
        .btn{background:#1a73e8;color:#fff;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;font-weight:600}
        .btn:hover{background:#1663c9}
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
        <a href="/quiero-donar" class="active">Quiero donar</a>
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
        <h1>Quiero Donar</h1>
        <div class="donation-card">
            <p><b>¡Gracias por tu generosidad!</b> Tu aporte nos ayuda a llegar a más comunidades vulnerables. Elige el tipo de donación que deseas realizar:</p>
        </div>
        
        <h2>Opciones de Donación</h2>
        <div class="donation-types">
            <div class="donation-box">
                <h3>💰 Donación Monetaria</h3>
                <p>Contribuye con dinero que será utilizado en programas de capacitación y apoyo comunitario.</p>
                <button class="btn">Donar Ahora</button>
            </div>
            
            <div class="donation-box">
                <h3>📦 Donación en Especie</h3>
                <p>Dona alimentos, equipos, ropa o materiales educativos a beneficiarios directos.</p>
                <button class="btn">Contactar</button>
            </div>
            
            <div class="donation-box">
                <h3>🤝 Voluntariado</h3>
                <p>Únete a nuestro equipo y dedica tu tiempo a transformar vidas.</p>
                <button class="btn open-register-modal">Registrarse</button>
            </div>
        </div>

        <h2>¿Cómo funciona tu donación?</h2>
        <div class="donation-card">
            <ol>
                <li><b>Registra tu donación:</b> Proporciona los detalles de tu aporte.</li>
                <li><b>Verificación:</b> Nuestro equipo valida y clasifica tu donación.</li>
                <li><b>Asignación inteligente:</b> La donación se asigna a beneficiarios según su nivel de vulnerabilidad.</li>
                <li><b>Entrega y seguimiento:</b> Recibes confirmación con evidencia fotográfica de la entrega.</li>
                <li><b>Reporte de impacto:</b> Accede a reportes detallados del impacto de tu donación.</li>
            </ol>
        </div>

        <h2>Transparencia Garantizada</h2>
        <p>Cada donación que realizas es rastreada desde su origen hasta su entrega final. Generamos reportes claros y accesibles para que veas exactamente cómo tu aporte genera impacto en las comunidades.</p>
        <div class="donation-card">
            <ul>
                <li>✅ Seguimiento en tiempo real</li>
                <li>✅ Reportes personalizados</li>
                <li>✅ Verificación fotográfica de entregas</li>
                <li>✅ Certificados de donación</li>
            </ul>
        </div>
    </main>
    @include('partials.floating-donate')
    @include('partials.user-modal')
</body>
</html>