<header class="main-header">
        <a href="index.php"><h1>EstacionARte</h1></a>
        <a href="#"><img src="icons/hamburguesa.png" alt="menu" class="toggle-nav"></a>
        <!-- <a href="#"><img src="icons/toggle-cerrar.png" alt="menu" class="toggle-nav-close"></a> -->
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
              <input type="email" name="email" placeholder="Email"/>
              <input type="password" name="password" placeholder="Contraseña"/>
              <input type="checkbox" name="recordarme" value="recordarme" id="recordarme"><label for="recordarme">Recordarme</label>
              <input type="submit" name="" value="INICIAR SESIÓN">
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
