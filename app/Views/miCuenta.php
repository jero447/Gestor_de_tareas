<div class="container-miCuenta">
    <h2>Mi cuenta</h2>
    <div class="datos-cuenta">
        <div class="nombre-apellido">
            <p>Nombre: <?= session("nombre") ?></p>
            <p>Apellido: <?= session("apellido") ?> </p>
         </div>
        <div>
            <p>Gmail: <?= session("email") ?> </p>
        </div>
    </div>

    <div class="botones-miCuenta">
       <a class="btn-cerrar-sesion" href="<?= site_url("cerrarSesion") ?>">Cerrar Sesion</a>
    </div>
    
</div>