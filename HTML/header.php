<?php
//Reanudamos la sesión
require_once('login-data-validation.php');
if (session_status() !== PHP_SESSION_ACTIVE)
session_start();

//Validamos si existe realmente una sesión activa o no
if(isset($_SESSION["user"]) && !empty($_SESSION['user'])){
?>

  <header class="main-header">

      <span class="welcome-user"><h4><?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?></h4></span>


      <a href="index.php"><h1>EstacionARte</h1></a>

      <div class="main-search">
        <form class="main-form-search" action="" method="get">
          <input type="text" name="buscar-texto" placeholder="Buscar cocheras">
          <input type="submit" name="buscar-submit" value="">
        </form>
      </div>

      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="icons/close-profile-nav2.png" alt=""></a>
        <a href="profile.php">Mi perfil</a>
        <a href="#">Configuración de mi cuenta</a>
        <a href="#">Ayuda</a>
        <a href="signout.php">Salir</a>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()"><img src=<?php echo "profile-pic/" . $_SESSION['user'][profilePic]?> alt="avatar" class="avatar"></span>

      <script>
      function openNav() {
          document.getElementById("mySidenav").style.width = "250px";}

      function closeNav() {
          document.getElementById("mySidenav").style.width = "0";}
      </script>

  </header>
<?php } else {
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión)
  ?>
  <header class="main-header">
          <a href="index.php"><h1>EstacionARte</h1></a>
          <a href="#"><img src="icons/hamburguesa.png" alt="menu" class="toggle-nav"></a>
          <nav class="main-nav">
            <ul>
              <li><a href="signin.php" class="iniciar-btn">Iniciar Sesión</a></li>
              <li><a href="#popup-iniciar" class="popup-link">Iniciar Sesión</a></li>
              <li><a href="signup.php" class="register-btn">Registrarse</a></li>
              <li><a href="#comofunciona" class="how-btn">¿Como funciona?</a></li>
              <li class="ayuda-li"><a href="faqs.php" class="faq-btn">Ayuda</a></li>
            </ul>
          </nav>
          <div class="modal-wrapper" id="popup-iniciar">
            <div class="popup-contenedor">
               <a class="popup-cerrar" href="#">X</a>
               <h2 class="title-signin">Iniciar sesión</h2>
             <section class="signin-popup">
             <div class="form-generico">
               <form action="" method="post">
                  <input
                  type="email"
                  name="email"
                  placeholder="Email"
                  <?php
                  $email="";
                  if (array_key_exists("email",$_POST)) {
                    $email = $_POST["email"];
                  } elseif (array_key_exists(COOKIE_USER_NAME,$_COOKIE)) {
                    $email = $_COOKIE[COOKIE_USER_NAME];
                  }
                  ?>
                  value="<?php echo $email; ?>"/>
                  <?php
                  if (isset($login_error) &&
                      $login_error->type != 2 &&
                      array_key_exists("popup",$_POST)
                    ) {
                    // unset($login_error);
                    ?>
                    <label style="color:red;"><?php echo $login_error->desc; ?></label>
                    <?php
                  }
                  ?>
                  <input type="password" name="password" placeholder="Contraseña"/>
                  <?php
                  if (isset($login_error) &&
                      $login_error->type == 2 &&
                      array_key_exists("popup",$_POST)
                    ) {
                    // unset($login_error);
                    ?>
                    <label style="color:red;"><?php echo $login_error->desc; ?></label>
                    <br>
                    <?php
                  }
                  $checked = FALSE;
                  if (array_key_exists("recordarme",$_POST)) {
                    $checked = TRUE;
                  } elseif (array_key_exists(COOKIE_REMEMBER_ME,$_COOKIE)) {
                    $checked = TRUE;
                  }
                  ?>
                  <input type="checkbox" name="recordarme" value="recordarme" id="recordarme" <?php if ($checked) {
                    echo "checked";
                  } ?>><label for="recordarme">Recordarme</label>

                  <input type="submit" name="" value="INICIAR SESIÓN">
                  <input type="checkbox" name="popup" style="display:none" checked>
                </form>
              </div>
                <a href="forgot-password.php">¿Olvidaste tu e-mail o contraseña?</a>
                <a href="signup.php">¿Aún no estás registrado?</a>
                <div class="login-separador">
                  <span>O</span>
                </div>
                <a href="#" class="facebook-login-button">Iniciar sesion con Facebook</a>
                <a href="#" class="google-login-button">Iniciar sesión con Google</a>
            </section>
          </div>
    </div>
  </header>
<?php } ?>
