<?php

if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();

if (isset($_SESSION['user']))
  header("Location:index.php");

require_once('login-data-validation.php');

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

        <div class="form-generico">

          <form action="" method="post">
            <input type="email" name="email" placeholder="E-Mail" id="email" required/>
            <div class="user_not_found"></div>
            <input type="password" name="password" placeholder="Contraseña" required/>
            <div class="wrong_password"></div>
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
  <script src="js/login_errors.js"></script>
  <?php
  if (array_key_exists(COOKIE_REMEMBER_ME,$_COOKIE) and $_SERVER['REQUEST_METHOD'] !== "POST")
  {
    ?>
    <script type="text/javascript">
    $('input[name=recordarme]').prop('checked', true);
    $("#email").val("<?php echo $_COOKIE[COOKIE_USER_NAME]; ?>");
    </script>
    <?php
  }

  if (isset($login_error)) {
    ?>
    <script type="text/javascript">
    show_login_error("<?php echo $label; ?>","<?php echo $login_error->desc; ?>");
    set_value_from_post("#email","<?php echo $_POST["email"]; ?>" );
    set_checkbox_from_post("recordarme","<?php $a = array_key_exists('recordarme',$_POST) ? TRUE : FALSE; echo $a; ?>" );
    </script>
    <?php
  }
  ?>
</body>
</html>
