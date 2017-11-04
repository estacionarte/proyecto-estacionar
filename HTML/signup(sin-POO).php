<?php

  require_once('functions.php');
  redirectLoggedUser();

  require_once('signup-procesamiento.php');

 ?>

<!DOCTYPE html>
<html>
  <?php require_once('head.php'); ?>
<body>

  <div class="container">

    <?php require_once('header.php'); ?>

    <div class="bodies-main-content">

      <hr>

      <h1>Crear Cuenta Nueva</h1>

      <section class="signup">

        <?php
        if (isset($_COOKIE['camposVacios']))
          if ($_COOKIE['camposVacios'] == "TRUE")
            echo "<p style='color:red'>Completar los campos vacíos</p>";
        if (isset($_COOKIE['error']) && !empty($_COOKIE['error']))
          echo "<p style='color:red'>" . $_COOKIE['error'] . "</p>";
        ?>

        <div class="form-generico">

          <form action="signup-exefunctions.php" method="post" enctype="multipart/form-data">

            <input type="text" placeholder="Nombre" name="firstName" class="form-firstname" style="<?php echo $_COOKIE['EMPTYfirstName']; ?>" value="<?php echo (isset($_COOKIE['firstName']) && !empty($_COOKIE['firstName'])) ? $_COOKIE['firstName'] : ""; ?>">

            <input type="text" placeholder="Apellido" name="lastName" class="form-lastname" style="<?php echo $_COOKIE['EMPTYlastName']; ?>" value="<?php echo (isset($_COOKIE['lastName']) && !empty($_COOKIE['lastName'])) ? $_COOKIE['lastName'] : ""; ?>">

            <!-- <label for="" class="form-birthdate-label">Fecha de Nacimiento:</label> -->

            <input type="number" placeholder="dd" name="birthDay" min="1" max="31" class="form-birthdate" style="<?php echo $_COOKIE['EMPTYbirthDay']; ?>" value="<?php echo (isset($_COOKIE['birthDay']) && !empty($_COOKIE['birthDay'])) ? $_COOKIE['birthDay'] : ""; ?>">

            <input type="number" placeholder="mm" name="birthMonth" min="1" max="12" class="form-birthdate" style="<?php echo $_COOKIE['EMPTYbirthMonth']; ?>" value="<?php echo (isset($_COOKIE['birthMonth']) && !empty($_COOKIE['birthMonth'])) ? $_COOKIE['birthMonth'] : ""; ?>">

            <input type="number" placeholder="aaaa" name="birthYear" min="1900" max="2010" class="form-birthdate" style="<?php echo $_COOKIE['EMPTYbirthYear']; ?>" value="<?php echo (isset($_COOKIE['birthYear']) && !empty($_COOKIE['birthYear'])) ? $_COOKIE['birthYear'] : ""; ?>">

            <!-- <?php
             $s = "selected";
             $tipo = isset( $_COOKIE['sexo']) ? $_COOKIE['sexo'] : '';
            ?>

            <select name="sexo" style="<?php echo $_COOKIE['EMPTYsexo']; ?>">
              <option value="">Género</option>
              <option value="female" <?php echo $tipo=='female'?$s:''; ?>>Femenino</option>
              <option value="male" <?php echo $tipo=='male'?$s:''; ?>>Masculino</option>
              <option value="other" <?php echo $tipo=='other'?$s:''; ?>>Otro</option>
            </select> -->

            <!-- <?php $tipo = isset( $_COOKIE['localidad']) ? $_COOKIE['localidad'] : ''; ?>

            <select name="localidad" style="<?php echo $_COOKIE['EMPTYlocalidad']; ?>">
              <option value="">Barrio</option>

              <?php

              $archivojson = file_get_contents("json/localidades.json");
              $localidades = json_decode($archivojson,true);

              foreach ($localidades["barriosAZ"] as $key) { ?>
                <option value="<?php echo $key ?>" <?php echo $tipo == $key ? $s:''; ?>><?php echo $key ?></option>
              <?php } ?>
            </select> -->

            <input type="email" placeholder="E-Mail" name="email" style="<?php echo $_COOKIE['EMPTYemail']; ?>" value="<?php echo (isset($_COOKIE['email']) && !empty($_COOKIE['email'])) ? $_COOKIE['email'] : ""; ?>">

            <!-- <input type="tel" placeholder="Teléfono Móvil" name="telefono" style="<?php echo $_COOKIE['EMPTYtelefono']; ?>" value="<?php echo (isset($_COOKIE['telefono']) && !empty($_COOKIE['telefono'])) ? $_COOKIE['telefono'] : ""; ?>"> -->

            <input type="password" placeholder="Contraseña" name="password" style="<?php echo $_COOKIE['EMPTYpassword']; ?>">

            <input type="password" placeholder="Confirmar Contraseña" name="confirmar-password" style="<?php echo $_COOKIE['EMPTYconfirmar-password']; ?>">

            <!-- <?php $tipo = isset( $_COOKIE['interes']) ? $_COOKIE['interes'] : ''; ?>

            <select name="interes" style="<?php echo $_COOKIE['EMPTYinteres']; ?>">
              <option value="">Interés Principal</option>
              <option value="locatario" <?php echo $tipo=='locatario'?$s:''; ?>>Buscar estacionamiento</option>
              <option value="propietario" <?php echo $tipo=='propietario'?$s:''; ?>>Ofrecer estacionamiento</option>
              <option value="ambos" <?php echo $tipo=='ambos'?$s:''; ?>>Ambos</option>
            </select> -->

            <input type="file" name="profilePic" accept="image/*" style="<?php echo $_COOKIE['EMPTYprofilePic']; ?>">

            <input type="submit" name="boton-submit" value="CREAR CUENTA">
          </form>

        </div>

        <p>Al hacer click en "Crear Cuenta", aceptas los términos y condiciones y la política de privacidad de EstacionARte.</p>

        <a href="signin.php">¿Ya estás registrado?</a>

        <div class="login-separador">
          <span>O</span>
        </div>

        <a href="#" class="facebook-login-button">Crear Cuenta con Facebook</a>
        <a href="#" class="google-login-button">Crear Cuenta con Google</a>

      </section>
    </div>
    <?php require_once('footer.php'); ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
