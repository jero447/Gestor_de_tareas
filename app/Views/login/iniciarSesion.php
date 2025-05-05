<!-- <div class="login-container">    
    <div class="login">
        <h1>Inicia Sesion</h1>
        <?php echo form_open( "/loguearUsuario" , ["class" => "form", "method" => "post"]); ?>
            <?php echo form_input(['name' => 'email', "type" => "email" ,'placeholder' => 'Email']);?>
            <?php echo form_password(['name' => 'contraseña','placeholder' => 'Contraseña']);?>
            <a href="<?= site_url("/registrar") ?>">¿Aun no tienes cuenta?</a>
            <?php echo form_submit("submit", "Iniciar Sesion") ?>
        <?php echo form_close();?>
    </div>
    
        
</div> -->


<body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        
      <?php echo form_open("/crearUsuario", ["class" => "form", "method" => "post"]); ?>
            <h1>Registrarse</h1>
            <div class="container-campos">
                <i class="fa-solid fa-user"></i>
                <?php echo form_input(['name' => 'nombre','placeholder' => 'Nombre', "class" => "campos"]);?>
            </div>
            <div class="container-campos">
                <i class="fa-solid fa-id-card-clip"></i>
                <?php echo form_input(['name' => 'apellido','placeholder' => 'Apellido',"class" => "campos"]);?>
            </div>
            <div class="container-campos">
                <i class="fa-regular fa-envelope"></i>
                <?php echo form_input(['name' => 'email', "type" => "email" ,'placeholder' => 'Email', "class" => "campos"]);?>
            </div>
            <div class="container-campos"> 
                <i class="fa-solid fa-lock"></i>
                <?php echo form_password(['name' => 'contraseña','placeholder' => 'Contraseña', "class" => "campos"]);?>
            </div>
            <?php echo form_submit("submit", "Registrar usuario") ?>
        <?php echo form_close();?>
      </div>
      <div class="form-container sign-in-container">
        <?php echo form_open( "/loguearUsuario" , ["method" => "post"]); ?>
            <h1>Iniciar Sesion</h1>

            <div class="container-campos">
                <i class="fa-regular fa-envelope"></i>
                <?php echo form_input(['name' => 'email', "type" => "email" ,'placeholder' => 'Correo Electronico', "class" => "campos"]);?>
            </div>

            <div class="container-campos">
                <i class="fa-solid fa-lock"></i>
                <?php echo form_password(['name' => 'contraseña','placeholder' => 'Password', "class" => "campos"]);?>
            </div>

            <?php echo form_submit("submit", "Iniciar Sesion") ?>
        <?php echo form_close();?>

      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>¡Bienvenido!</h1>
            <p>
              Inicia sesión con tu cuenta
            </p>
            <button class="ghost" id="signIn">Inicia sesión</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hola!!!</h1>
            <p>Crear tu cuenta</p>
            <button class="ghost" id="signUp">Registrar</button>
          </div>
        </div>
      </div>
    </div>


    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () =>
          container.classList.add('right-panel-active')
        );

        signInButton.addEventListener('click', () =>
          container.classList.remove('right-panel-active')
        );
    </script>
    
</body>
