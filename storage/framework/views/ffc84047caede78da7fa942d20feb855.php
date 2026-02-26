<div id="user-modal" style="display:none;position:fixed;right:20px;top:80px;z-index:10000;max-width:420px;width:calc(100% - 40px);">
    <div style="background:#fff;border-radius:10px;box-shadow:0 8px 24px rgba(0,0,0,0.15);overflow:hidden;border:1px solid #e6e9ef;">
        <div style="display:flex;gap:0;background:#f7fafc;border-bottom:1px solid #eee">
            <button id="tab-register" style="flex:1;padding:12px 16px;border:0;background:transparent;cursor:pointer;font-weight:700">Crear cuenta</button>
            <button id="tab-login" style="flex:1;padding:12px 16px;border:0;background:transparent;cursor:pointer;font-weight:700">Iniciar sesión</button>
            <button id="close-user-modal" aria-label="Cerrar" style="border:0;background:transparent;padding:12px 16px;cursor:pointer">✕</button>
        </div>
        <div id="user-forms" style="padding:18px;">
            <?php if(session('success')): ?>
                <div style="background:#e6ffef;border:1px solid #b7f3cc;padding:8px 12px;border-radius:6px;margin-bottom:10px;color:#0b6b3b"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
                <div style="background:#fff0f0;border:1px solid #f3b7b7;padding:8px 12px;border-radius:6px;margin-bottom:10px;color:#7a1b1b">
                    <ul style="margin:0;padding-left:18px">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($err); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(session('usuario_username')): ?>
                <div style="padding:8px 10px;background:#f5fbf7;border:1px solid #e0f3e6;border-radius:6px;margin-bottom:12px">
                    <strong>Conectado como</strong>
                    <div style="margin-top:6px;display:flex;justify-content:space-between;align-items:center">
                        <div><?php echo e(session('usuario_username')); ?></div>
                        <form method="POST" action="/logout">
                            <?php echo csrf_field(); ?>
                            <button type="submit" style="background:#ff5a5f;color:#fff;border:0;padding:6px 10px;border-radius:6px;cursor:pointer">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <div id="register-form" style="display:block">
                <form method="POST" action="/register">
                    <?php echo csrf_field(); ?>
                    <div style="margin-bottom:10px"><label>Usuario</label><input name="username" required style="width:100%;padding:8px;border:1px solid #e0e0e0;border-radius:6px"></div>
                    <div style="margin-bottom:10px"><label>Contraseña</label><input type="password" name="password" required style="width:100%;padding:8px;border:1px solid #e0e0e0;border-radius:6px"></div>
                    <div style="margin-bottom:10px"><label>Confirmar contraseña</label><input type="password" name="password_confirmation" required style="width:100%;padding:8px;border:1px solid #e0e0e0;border-radius:6px"></div>
                    <div style="text-align:right"><button type="submit" style="background:#1a73e8;color:#fff;border:0;padding:10px 14px;border-radius:6px;cursor:pointer">Crear cuenta</button></div>
                </form>
            </div>
            <div id="login-form" style="display:none">
                <form method="POST" action="/login">
                    <?php echo csrf_field(); ?>
                    <div style="margin-bottom:10px"><label>Usuario</label><input name="username" required style="width:100%;padding:8px;border:1px solid #e0e0e0;border-radius:6px"></div>
                    <div style="margin-bottom:10px"><label>Contraseña</label><input type="password" name="password" required style="width:100%;padding:8px;border:1px solid #e0e0e0;border-radius:6px"></div>
                    <div style="text-align:right"><button type="submit" style="background:#1a73e8;color:#fff;border:0;padding:10px 14px;border-radius:6px;cursor:pointer">Iniciar sesión</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    (function(){
        const modal = document.getElementById('user-modal');
        const openButtons = document.querySelectorAll('.user-button');
        const registerModalBtn = document.querySelector('.open-register-modal');
        const closeBtn = document.getElementById('close-user-modal');
        const tabRegister = document.getElementById('tab-register');
        const tabLogin = document.getElementById('tab-login');
        const regForm = document.getElementById('register-form');
        const logForm = document.getElementById('login-form');
        const hasErrors = <?php echo json_encode($errors->any(), 15, 512) ?>;

        function showModal(tab){
            if(tab==='login'){ regForm.style.display='none'; logForm.style.display='block'; }
            else { regForm.style.display='block'; logForm.style.display='none'; }
            modal.style.display='block';
            modal.scrollIntoView({behavior:'smooth',block:'center'});
        }

        // Si hay flag flash para abrir el modal o hay errores, mantén el modal abierto
        <?php if(session('open_user_modal') || $errors->any()): ?>
            <?php
                $tab = session('open_user_modal') ?? ($errors->has('login') ? 'login' : 'register');
            ?>
            showModal('<?php echo e($tab); ?>');
        <?php endif; ?>

        openButtons.forEach(b=>b.addEventListener('click',function(e){ e.preventDefault(); showModal(); }));
        if(registerModalBtn) registerModalBtn.addEventListener('click',function(e){ e.preventDefault(); showModal('register'); });
        closeBtn.addEventListener('click',function(){ modal.style.display='none'; });
        tabRegister.addEventListener('click',function(){ showModal('register'); });
        tabLogin.addEventListener('click',function(){ showModal('login'); });
        document.addEventListener('keydown',function(e){ if(e.key==='Escape' && !hasErrors) modal.style.display='none'; });
    })();
</script>

<?php /**PATH C:\xampp\htdocs\fundacion_is\resources\views/partials/user-modal.blade.php ENDPATH**/ ?>