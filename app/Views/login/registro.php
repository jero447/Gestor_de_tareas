<div class="login-container">    
    <div class="login">
        <h1>Registrarse</h1>
        <?php echo form_open("/crearUsuario", ["class" => "form", "method" => "post"]); ?>
            <?php echo form_input(['name' => 'nombre','placeholder' => 'Nombre']);?>
            <?php echo form_input(['name' => 'apellido','placeholder' => 'Apellido']);?>
            <?php echo form_input(['name' => 'email', "type" => "email" ,'placeholder' => 'Email']);?>
            <?php echo form_password(['name' => 'contraseña','placeholder' => 'Contraseña']);?>
            <a href="<?= site_url("/iniciar_sesion") ?>">¿Ya tienes una cuenta?</a>
            <?php echo form_submit("submit", "Registrar usuario") ?>
        <?php echo form_close();?>
    </div>
    
        
</div>