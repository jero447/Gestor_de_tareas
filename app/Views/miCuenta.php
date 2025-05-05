<div class="container-miCuenta">
    <h2>Mi cuenta</h2>
    <div class="datos-cuenta">
        <div class="nombre-apellido">
            <p><span class="label">Nombre:</span> <?= session("nombre") ?></p>
            <p><span class="label">Apellido:</span> <?= session("apellido") ?> </p>
         </div>
        <div class="gmail">
            <p><span class="label">Gmail:</span> <?= session("email") ?> </p>
        </div>
    </div>

    <div class="botones-miCuenta">
       <a class="btn-cerrar-sesion" href="<?= site_url("cerrarSesion") ?>">Cerrar Sesion</a>
       <a href="" class="btn-modificar">Modficar Cuenta</a>
    </div>
    
</div>