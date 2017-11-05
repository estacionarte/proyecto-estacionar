<?php

require_once('soporte.php');
$auth->redirectLoggedUser();

if ($_POST) {
		// $error = $validator->validarLogin($db);

		// var_dump($error);
		//
		// $usuario = $db->traerPorEmail($_POST["email"]);
		//
		// $contra = $usuario->getPassword();
		//
		// echo "<br>";
		// var_dump($contra);
		// echo "<br>";
		// echo $_POST["password"];
		// echo "<br>";
		// $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
		// echo $pass;
		// echo "<br>";
		// var_dump(password_verify($_POST["password"], $usuario->getPassword()));

		if (count($error) == 0) {
			$auth->loguear($_POST["email"]);

			if (isset($_POST["recordame"])) {
				setcookie("user", $_POST["email"], time()+60*60*24*365);
			}

			header("Location: profile.php");
		}
	}

?>
<!DOCTYPE html>
<html>
  <?php
  require_once('head.php');
  ?>
<body>
  <div class="container">
    <?php require_once('header.php'); ?>

    <div class="bodies-main-content">

      <hr>

      <h1>Iniciar Sesión</h1>

      <section class="signin">

        <?php
        if (isset($error))
          echo "<p style='color:red'>" . $error['desc'] . "</p>";
        ?>

        <div class="form-generico">

          <form action="signin.php" method="post">
            <input type="email" name="email" placeholder="E-Mail" id="email" required/>
            <input type="password" name="password" placeholder="Contraseña" required/>
            <input type="checkbox" name="recordarme" value="recordarme" id="recordarme">
            <label for="recordarme">Recordarme</label>
            <input type="submit" name="" value="INICIAR SESIÓN">
          </form>

        </div>

        <a href="forgot-password.php">¿Olvidaste tu e-mail o contraseña?</a>
        <a href="signup.php">¿Aún no estás registrado?</a>

        <div class="login-separador">
          <span>O</span>
        </div>

        <a href="#" class="facebook-login-button">Iniciar sesión con Facebook</a>
        <a href="#" class="google-login-button">Iniciar sesión con Google</a>

      </section>
    </div>
    <?php require_once('footer.php'); ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

</body>
</html>
