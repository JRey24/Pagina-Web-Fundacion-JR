<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz de Fundación con Menú</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {font-family: 'Inter', sans-serif;margin: 0;padding: 0;background-color: #f4f7f9;}
        .header {background-color: #ffffff;padding: 15px 30px;border-bottom: 1px solid #e0e0e0;display: flex;justify-content: space-between;align-items: center;}
        .brand-link{display:flex;align-items:center;gap:12px;text-decoration:none;color:inherit}
        .titulo {font-family: 'Inter', sans-serif; font-size: 2.5em; font-weight: 700; color: #1a73e8; letter-spacing: -0.5px;margin: 0;display: inline-block;}
        .user-button {background-color: #1a73e8;color: white; border: none;padding: 10px 20px;border-radius: 5px; font-weight: 600;cursor: pointer;text-decoration: none;transition: background-color 0.3s;}
        .user-button:hover {background-color: #1663c9;}
        .navbar { background-color: #34495e;padding: 10px 30px;}
        .navbar a {color: white;text-decoration: none;padding: 10px 15px;margin-right: 5px;font-size: 1em;font-weight: 400;transition: background-color 0.3s;border-radius: 3px;}
        .navbar a:hover {background-color: #4b637a;}
        .content-section {padding: 40px 30px;margin-top: 20px;background-color: #fff;border-radius: 8px;box-shadow: 0 2px 4px rgba(0,0,0,0.1);}
        .content-section h1 {color: #34495e;border-bottom: 2px solid #e0e0e0;padding-bottom: 10px;}
        .story{background:#ecf0f1;padding:20px;border-left:5px solid #1a73e8;border-radius:4px}
        #user-area {min-height: 500px;background-color: #ecf0f1;padding: 40px 30px;border-radius: 8px;margin-top: 30px;border-left: 5px solid #1a73e8;}
    </style>
</head>
<body>

    <header class="header">
        <a href="/" class="brand-link" aria-label="Ir al inicio">
            <img src="/img/logo.png" width="120" alt="Logo">
            <h1 class="titulo">Fundacion Esperanza Digital</h1>
        </a>
        <?php if(session('usuario_username')): ?>
            <a href="#" class="user-button"><?php echo e(session('usuario_username')); ?></a>
        <?php else: ?>
            <a href="#" class="user-button" onclick="event.preventDefault();document.getElementById('user-modal')?.style.display='block';document.getElementById('register-form')?.style.display='block';document.getElementById('login-form')?.style.display='none';">Crear cuenta</a>
        <?php endif; ?>
    </header>

        <nav class="navbar">
        <a href="/">Inicio</a>
        <a href="/sobre-nosotros">Sobre Nosotros</a>
        <a href="/proyectos">Proyectos</a>
        <a href="/quiero-donar">Quiero donar</a>
        <a href="/contacto">Contacto</a>
        <?php if(session('usuario_id')): ?>
            <?php
                $usuario = \App\Models\Usuario::find(session('usuario_id'));
                if($usuario && $usuario->hasRole('administrador')) {
            ?>
                    <a href="/usuarios">Usuarios</a>
            <?php } ?>
        <?php endif; ?>
    </nav>

    <!-- HERO -->
    <section style="background: linear-gradient(90deg,#f5fbff 0%, #ffffff 100%);padding:48px 30px;border-bottom:1px solid #e9eef3;">
        <div style="max-width:1200px;margin:0 auto;display:flex;gap:30px;align-items:center;">
            <div style="flex:1;">
                <h1 style="font-size:2.4rem;color:#1a73e8;margin:0 0 12px;">Fundación Esperanza Digital</h1>
                <p style="color:#34495e;font-size:1.05rem;line-height:1.5;">Trabajamos para reducir la brecha digital y llevar recursos, formación y oportunidades a comunidades en situación de vulnerabilidad. Transparencia, impacto y cercanía son el eje de nuestro trabajo.</p>

                <div style="margin-top:18px;display:flex;gap:12px;align-items:center;">
                    <a href="/quiero-donar" class="user-button" style="background:#ff6b6b">Donar ahora</a>
                    <a href="#voluntariado" class="user-button" style="background:#1a73e8">Quiero ser voluntario</a>
                    
                </div>
            </div>
            <div style="width:360px;flex:0 0 360px;text-align:center;">
                <img src="/img/Manos portada.jpg" alt="Manos ayudando" style="max-width:100%;border-radius:12px;box-shadow:0 6px 18px rgba(20,40,80,0.08);">
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT WRAPPER -->
    <main style="max-width:1200px;margin:28px auto;padding:0 20px;">

        <!-- MISION / VISION -->
        <section class="content-section" style="display:flex;gap:24px;align-items:stretch;">
            <div style="flex:1;">
                <h2>Nuestra Misión</h2>
                <p>Desarrollar soluciones tecnológicas que permitan gestionar donaciones con eficiencia, trazabilidad y equidad, garantizando que cada aporte genere el mayor impacto posible.</p>
                <h2>Nuestra Visión</h2>
                <p>Ser una fundación modelo en innovación social, con un sistema digital que permita transformar la forma en que se administran y distribuyen recursos en Colombia y Latinoamérica.</p>
            </div>
            <div style="flex:0 0 320px;">
                <h3>Valores</h3>
                <ul>
                    <li>Transparencia</li>
                    <li>Responsabilidad</li>
                    <li>Solidaridad</li>
                    <li>Innovación social</li>
                </ul>
            </div>
        </section>

        <!-- FEATURED PROJECTS -->
        <section class="content-section" style="margin-top:22px;">
            <h2>Proyectos destacados</h2>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:16px;margin-top:16px;">
                <article style="background:#fff;padding:16px;border-radius:8px;border:1px solid #eef3f7;">
                    <h4>Sistema Integral de Gestión de Donaciones</h4>
                    <p>Este sistema reduce errores, mejora la entrega de ayudas y garantiza que cada aporte sea utilizado correctamente.</p>
                    <a href="/proyectos" style="color:#1a73e8;font-weight:600;text-decoration:none">Ver proyecto →</a>
                </article>
                <article style="background:#fff;padding:16px;border-radius:8px;border:1px solid #eef3f7;">
                    <h4>Apoyo a Familias en Vulnerabilidad</h4>
                    <p>En este proyecto priorizamos a quienes más necesitan apoyo real e inmediato.</p>
                    <a href="/proyectos" style="color:#1a73e8;font-weight:600;text-decoration:none">Ver proyecto →</a>
                </article>
                <article style="background:#fff;padding:16px;border-radius:8px;border:1px solid #eef3f7;">
                    <h4>Ruta de Distribución Segura</h4>
                    <p>Este proyecto garantiza transparencia en en todo el trayecto.</p>
                    <a href="/proyectos" style="color:#1a73e8;font-weight:600;text-decoration:none">Ver proyecto →</a>
                </article>
            </div>
        </section>

        <!-- QUICK STATS + TESTIMONIALS -->
        <section style="display:grid;grid-template-columns:1fr;gap:18px;margin-top:22px;">
            <div class="content-section">
                <h2>Impacto reciente</h2>
                <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:12px;">
                    <div style="flex:1;min-width:140px;background:#f7fbff;padding:12px;border-radius:8px;border:1px solid #e6f0fb;text-align:center;">
                        <div style="font-size:1.6rem;font-weight:700;color:#1a73e8">1.200+</div>
                        <div>Personas beneficiadas</div>
                    </div>
                    <div style="flex:1;min-width:140px;background:#fff7f7;padding:12px;border-radius:8px;border:1px solid #fdecea;text-align:center;">
                        <div style="font-size:1.6rem;font-weight:700;color:#ff6b6b">320+</div>
                        <div>Equipos entregados</div>
                    </div>
                    <div style="flex:1;min-width:140px;background:#f7fff7;padding:12px;border-radius:8px;border:1px solid #eafbe9;text-align:center;">
                        <div style="font-size:1.6rem;font-weight:700;color:#22c55e">45</div>
                        <div>Proyectos ejecutados</div>
                    </div>
                </div>

                <h3 style="margin-top:18px;">Testimonios</h3>
                <blockquote style="margin:12px 0;padding:12px 16px;background:#fbfcff;border-left:4px solid #1a73e8;border-radius:6px;">"Gracias a la fundación pude recibir ayuda por parte de las donaciones para tener una mejor calidad de vida." — María, beneficiaria</blockquote>
            </div>
        </section>

        <!-- CONTACTO RÁPIDO -->
        <section class="content-section" style="margin-top:18px;">
            <h2>Contacto rápido</h2>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-top:12px;">
                <div>
                    <p style="margin:0;color:#6b7280;font-size:0.9rem;font-weight:600;">Email</p>
                    <p style="margin:4px 0;color:#1a73e8;"><a href="mailto:Juan.rey-mo@uniminuto.edu.co" style="color:inherit;text-decoration:none;">Juan.rey-mo@uniminuto.edu.co</a></p>
                </div>
                <div>
                    <p style="margin:0;color:#6b7280;font-size:0.9rem;font-weight:600;">Teléfono</p>
                    <p style="margin:4px 0;">+57 322 392 9037</p>
                </div>
                <div>
                    <p style="margin:0;color:#6b7280;font-size:0.9rem;font-weight:600;">Dirección</p>
                    <p style="margin:4px 0;">Carrera 73A No. 81B – 70., Bogotá D.C, Colombia</p>
                </div>
            </div>
            <div style="margin-top:16px;"><a href="/contacto" style="background:#1a73e8;color:#fff;padding:10px 20px;border-radius:5px;text-decoration:none;font-weight:600;display:inline-block;">Escríbenos →</a></div>
        </section>

        <!-- VOLUNTARIADO CTA -->
        <section id="voluntariado" class="content-section" style="margin-top:22px;display:flex;align-items:center;justify-content:space-between;gap:16px;">
            <div>
                <h3>¿Quieres ayudar como voluntario?</h3>
                <p>Únete a nuestras brigadas, apoya talleres o colabora en logística. Todas las manos son bienvenidas.</p>
            </div>
            <div>
                <a href="#" class="user-button" style="background:#1a73e8;">Registrarme como voluntario</a>
            </div>
        </section>

        <!-- FOOTER -->
        <footer style="margin-top:28px;padding:18px 20px;border-top:1px solid #e9eef3;color:#6b7280;text-align:center;border-radius:6px;">
            <div style="max-width:1200px;margin:0 auto;display:flex;flex-wrap:wrap;justify-content:space-between;gap:12px;align-items:center;">
                <div>&copy; <?php echo e(date('Y')); ?> Fundación Esperanza Digital — Todos los derechos reservados</div>
                <div>
                    <a href="/sobre-nosotros" style="color:inherit;text-decoration:none;margin-right:12px;">Sobre nosotros</a>
                    <a href="/proyectos" style="color:inherit;text-decoration:none;margin-right:12px;">Proyectos</a>
                    <a href="/contacto" style="color:inherit;text-decoration:none;">Contacto</a>
                </div>
            </div>
        </footer>

    </main>
    <?php echo $__env->make('partials.floating-donate', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.user-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\fundacion_is\resources\views/inicio.blade.php ENDPATH**/ ?>