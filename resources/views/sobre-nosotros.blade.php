<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - Fundación Esperanza Digital</title>
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
        .story{background:#ecf0f1;padding:20px;border-left:5px solid #1a73e8;border-radius:4px}
    </style>
</head>
<body>
    <header class="header">
        <a href="/" class="brand-link" aria-label="Ir al inicio">
            <img src="/img/logo.png" width="120" alt="Logo">
            <h1 class="titulo">Fundacion Esperanza Digital</h1>
        </a>
        @if(session('usuario_username'))
            <a href="#" class="user-button">{{ session('usuario_username') }}</a>
        @else
            <a href="#" class="user-button">Crear cuenta</a>
        @endif
    </header>
    <nav class="navbar">
        <a href="/">Inicio</a>
        <a href="/sobre-nosotros" class="active">Sobre Nosotros</a>
        <a href="/proyectos">Proyectos</a>
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
        <h1>Sobre Nosotros</h1>
        <div class="story">
        <p><b>Aquí puedes encontrar información sobre nosotros, nuestra misión, visión, nuestros valores e impacto social.</b></p>
        </div>        
        <h2>Quienes Somos</h2>
        <p>Fundada en 2025, la Fundación Esperanza Digital,  creada como un proyecto estudiantil, somos una organización sin ánimo de lucro dedicada a conectar a donantes con comunidades vulnerables con alimentos, 
        ayudas y beneficios, donde a la vez creamos innovacion, utilizando tecnología para garantizar una administración responsable, transparente y segura de los recursos. gracias a nuestro fundador <b><i>Juan Andrez Rey Morales</i></b>, se construye una increible función para el futuro.</p>
        <p>Apoyanos y sigamos llegando a mas personas.</p>
        <h2>Misión</h2>
            <p>Desarrollar soluciones tecnológicas que permitan gestionar donaciones con eficiencia, trazabilidad y equidad, garantizando que cada aporte genere el mayor impacto posible.</p>
        <h2>Visión</h2>
            <p>Ser una fundación modelo en innovación social, con un sistema digital que permita transformar la forma en que se administran y distribuyen recursos en Colombia y Latinoamérica. </p>
        <h2>Nuestros Valores</h2>
        <ul>
            <p><li><b>Transparencia:</b> Cada donación tiene seguimiento completo.</li></p>
            <p><li><b>Responsabilidad: </b>Entregamos recursos donde más se necesitan.</li></p>
            <p><li><b>Solidaridad:</b> Trabajamos por quienes enfrentan niveles altos de vulnerabilidad.</li></p>
            <p><li><b>Innovación social:</b> Tecnología al servicio del bienestar comunitario.</li></p>
        </ul>
        <h2>Impacto Social</h2>
            <p>La Fundación Esperanza Digital genera un impacto social significativo al transformar la manera en que las ayudas llegan a las comunidades más vulnerables.
            A través de una plataforma tecnológica innovadora y transparente, logramos que cada donación <i><b>en especie o monetaria</b></i> sea administrada con eficiencia, 
            responsabilidad y trazabilidad completa, asegurando que los recursos beneficien realmente a quienes más lo necesitan.</p>
        <div class="story">
            <ol>
                <li><h3>Reduccion de la desigualdad:</h3></li>
                <p>Nuestro sistema prioriza a personas y familias según su nivel real de vulnerabilidad. 
                Esto permite que las ayudas lleguen a quienes presentan mayores necesidades, 
                reduciendo brechas sociales y mejorando sus condiciones de vida.</p>

                <li><h3>Transparencia y confianza en las donaciones:</h3></li>
                <p>La plataforma permite:</p>
                <ul>
                    <p><li>Seguimiento en tiempo real de cada donación.</li></p>
                    <p><li>Generación de reportes claros y accesibles para donantes y administradores.</li></p>
                    <p><li>Verificación fotográfica de la entrega a beneficiarios.</li></p>
                </ul>
                <p>Esto incrementa la confianza ciudadana en los procesos humanitarios y motiva a más personas y empresas a donar con seguridad. </p>
                
                <li><h3>Mejor distribuición de recursos:</h3></li>
                <p>Gracias a nuestro sistema de asignación inteligente, optimizamos la distribución de recursos según los beneficiarios, 
                inventarios y entregas lo cual reduce errores humanos y evita duplicidades, logrando:</p>
                <ul>
                    <p><li>Entrega oportuna de ayudas.</li></p>
                    <p><li>Minimización de desperdicios en el inventario.</li></p>
                    <p><li>Maximización del impacto social de cada donación.</li></p>
                    <p><li>Distribución estrategica basada en necesidades reales.</li></p>
                </ul>

                <li><h3>Fortalecimiento del tejido comunitario:</h3></li>
                <p>Al garantizar procesos claros y transparentes:</p>
                <ul>
                    <p><li>Fomentamos la participación activa y solidaria de las comunidades en la gestión de ayudas.</li></p>
                    <p><li>Generamos confianza y relacion entre donantes, voluntarios y beneficiarios.</li></p>
                    <p><li>Promovemos la colaboración y solidaridad social.</li></p>
                    <p><li>Contribuimos a la construcción de comunidades más resilientes y cohesionadas con bases en la ayuda responsable.</li></p>
                </ul>

                <li><h3>Eficiencia operativa para organizaciones sociales:</h3></li>
                <p>La plataforma mejora las capacidades de operación de organizaciones sin ánimo de lucro, permitiendo:</p>
                <ul>
                    <p><li>Automatización de reportes y procesos administrativos, generando una reduccion del 60% en tiempo.</li></p>
                    <p><li>Reducción de costos operativos.</li></p>
                    <p><li>Mejora en la toma de decisiones basada en datos reales.</li></p>
                    <p><li>Enfoque en la misión social en lugar de tareas burocráticas.</li></p>
                    <p><li>Mayor alcance con los mismos recursos.</li></p>
                    <p><li>Coordinacion digital de entregas.</li></p>
                </ul>

                <li><h3>Impacto emocional y humano:</h3></li>
                <p>Cada donacion que llega correctamente representa:</p>
                <ul>
                    <p><li>Mejora en la calidad de vida de beneficiarios.</li></p>
                    <p><li>Generación de esperanza, bienestar y dignidad.</li></p>
                    <p><li>Fortalecimiento del sentido de comunidad y apoyo mutuo.</li></p>
                    <p><li>Inspiración para más actos de solidaridad y generosidad.</li></p>
                    <p><li>Alivio económico para una familia.</li></p>
                </ul>
                <p>Gracias a la tecnologia, logramos que la solidaridad se convierta en esperanza real y medible.</p>
            </ol>
        </div>
    </main>
    @include('partials.floating-donate')
    @include('partials.user-modal')
</body>
</html>
