
    <header>
         <nav>
            <div>
                <a class="logo" href="<?= site_url("/") ?>"><h1>Orden y Acción</h1></a>
            </div>
            <div>
                <?php if(session()->get("logueado")): ?>
                    <div class="menu">
                        <p>Hola, <?= session()->get("nombre") ?> </p>
                        <a href="<?= site_url("miCuenta") ?>" class="miCuenta">Mi cuenta</a>
                    </div>
                    
                <?php else: ?>
                    <a class="btn-iniciar-sesion" href="<?= site_url("/iniciar_sesion") ?>">Iniciar Sesion</a>
                <?php endif; ?>
                
            </div>
         </nav>

    </header>
