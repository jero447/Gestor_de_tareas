<div class="login-container">    
    <div class="login">
        <h1>Inicia Sesion</h1>
        <?php echo form_open( "/loguearUsuario" , ["class" => "form", "method" => "post"]); ?>
            <?php echo form_input(['name' => 'email', "type" => "email" ,'placeholder' => 'Email']);?>
            <?php echo form_password(['name' => 'contraseña','placeholder' => 'Contraseña']);?>
            <a href="<?= site_url("/registrar") ?>">¿Aun no tienes cuenta?</a>
            <?php echo form_submit("submit", "Iniciar Sesion") ?>
        <?php echo form_close();?>
    </div>
    
        
</div>