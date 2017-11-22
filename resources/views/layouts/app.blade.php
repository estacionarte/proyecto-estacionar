<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <!-- ICONO DE LA PESTAÑA DEL NAVEGADOR -->
  <link rel="icon" href="icons/favicon1.png" type="image/png" sizes="16x16">
  <!-- FONT CABIN -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
  <!-- FONT BLACK -->
  <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
  <!-- FONT ROBOTO -->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <!-- FONT LATO -->
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <!-- ICONOS -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- main-profile-edit-nav -->
  <link rel="stylesheet"
   href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
  <body>
    <header class="main-header">
            <a href="index.php"><h1>Estacionarte</h1></a>
            <a href="#"><img src="icons/hamburguesa.png" alt="menu" class="toggle-nav"></a>
            <nav class="main-nav">
              <ul>
                <li><a href="signin.php" class="iniciar-btn">Iniciar Sesión</a></li>
                <li><a href="#popup-iniciar" class="popup-link">Iniciar Sesión</a></li>
                <li><a href="signup" class="register-btn">Registrarse</a></li>
                <li><a href="#comofunciona" class="how-btn">¿Como funciona?</a></li>
                <li class="ayuda-li"><a href="faqs" class="faq-btn">Ayuda</a></li>
              </ul>
            </nav>
            <div class="modal-wrapper" id="popup-iniciar">
              <div class="popup-contenedor">
                 <a class="popup-cerrar" href="#">X</a>
                 <h2 class="title-signin">Iniciar sesión</h2>
               <section class="signin-popup">

                 <?php
                 if (isset($_COOKIE['loginError']) && !empty($_COOKIE['loginError']))
                   echo "<p style='color:red'>" . $_COOKIE['loginError'] . "</p>";
                 ?>
      <?php
        if ($_POST) {
          if (count($error) == 0) {
            $auth->loguear($_POST["email"]);

        if (isset($_POST["recordame"])) {
          setcookie("user", $_POST["email"], time()+60*60*24*365);
        }

            header("Location: profile.php");
              }
        }

      ?>
       <div class="form-generico">
         <form action="" method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="checkbox" name="recordarme" value="recordarme" id="recordarme">
            <label for="recordarme">Recordarme</label>
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

    @yield('body')
    @yield('faqs')
    @yield('signin')
    @yield('signup')
    @yield('underconstruction')

    <footer class="main-footer">
      <div class="main-footer-div-left">
        <h4>Empresa</h4>
        <ul>
          <li><a href="underconstruction">¿Quiénes somos?</a></li>
          <li><a href="underconstruction">Contacto</a></li>
        </ul>
      </div>
      <div class="main-footer-div-right">
        <h4>Ayuda</h4>
        <ul>
          <li><a href="#comofunciona">¿Cómo funciona?</a></li>
          <li><a href="/faqs">FAQs</a></li>
          <li><a href="underconstruction">Términos y condiciones</a></li>
          <li><a href="underconstruction" class="last">Políticas de privacidad</a></li>
        </ul>
      </div>
    </footer>
    <section class="redes-sociales">
      <div class="facebook">
        <a href="https://www.facebook.com/Estacionarte-352116461897716/" target="_blank"><img src="icons/facebook.png" alt=""></a>
      </div>
      <div class="twitter">
        <a href="http://twitter.com" target="_blank"><img src="icons/twitter.png" alt=""></a>
      </div>
      <div class="instagram">
        <a href="http://instagram.com" target="_blank"><img src="icons/instagram.png" alt=""></a>
      </div>
    </section>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  		<script>
  		$('.toggle-nav').click(function (){
  			$('.main-nav').slideToggle(100);
        $('.toggle-nav').toggleClass('rotate');
  		});
  	  </script>

  </body>
</html>
