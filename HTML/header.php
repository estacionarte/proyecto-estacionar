<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>EstacionARte</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <header class="main-header">
      <a href="index.php"><h1>EstacionARte</h1></a>
        <a href="#">
          <img src="images/hamburguesa.png" alt="menu" class="toggle-nav">
        </a>
      <nav class="main-nav">
        <ul>
          <li><a href="signin.php" class="iniciar-btn">Iniciar Sesión</a></li>
          <li><a href="signup.php" class="register-btn">Registrarse</a></li>
          <li><a href="#comofunciona" class="how-btn">¿Como funciona?</a></li>
          <li class="ayuda-li"><a href="faqs.php" class="faq-btn">Ayuda</a></li>
        </ul>
      </nav>
      <a href="#popup-iniciar" class="popup-link">Iniciar Sesión</a>
      <div class="modal-wrapper" id="popup-iniciar">
         <div class="popup-contenedor">
            <a class="popup-cerrar" href="#">X</a>
            <h1 class="tittle-signin">Iniciar sesión</h1>
            <section class="recuperar-password">
              <div>
                <form action="" method="post">
                  <input type="email" class="form-control" placeholder="Email"/>
                  <input type="password" class="form-control" placeholder="Contraseña"/>
                  <label><input type="checkbox">Recordarme</label>
                  <input type="submit" name="" value="Continuar">
                </form>
              </div>
            </section>
            <a href="forgot-password.php">Olvidé mi contraseña</a><br>
            <label>¿No tenés una cuenta?<a href="signup.php" class="text-center"> Registrate</a></label>
         </div>
      </div>
    </header>
  </body>
</html>
