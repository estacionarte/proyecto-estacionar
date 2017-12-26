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

    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">

    <!-- ICONOS -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    {{-- BOOSTRAP ICONS--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     {{-- jquery --}}
     <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

     {{-- CAROUSEL DE BOOSTRAP--}}
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     {{-- MAPA --}}
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>

      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" id="hojaDeEstilo">

    @yield('scripts')

    {{-- Scripts --}}
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
  </head>
  <body>
    <header class="main-header">

        <a href="/"><img src="/images/logo4.jpg" alt="logotipo" class="logo"></a>

      @auth

        <nav class="main-nav">

          {{-- NOMBRE DE USUARIO --}}
          <span class="welcome-user"><h4>{{Auth::user()->firstName}} {{Auth::user()->lastName}}</h4></span>

          {{-- FOTO DE PERFIL DE USUARIO --}}
          <span style="font-size:30px;cursor:pointer" onclick="openNav()"><img class="avatar" src="/storage/profilePic/{{Auth::user()->profilePic}}" alt="avatar"></span>

          <div class="clear"></div>

          {{-- MENÚ LATERAL --}}
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="/images/close-profile-nav2.png" alt=""></a>
            <a href="{{ route('profile') }}" class="fa fa-btn fa-user"> Mi perfil</a>
            <a href="#" class="fa fa-address-card-o"> Configuración de mi cuenta</a>
            <a href="faqs" class="fa fa-info-circle"> Ayuda</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="fa fa-btn fa-sign-out"> Salir</a>
          </div>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      @endauth

      @guest

        <a href="#menu" id="toggle"><span></span></a>

        <div class="clear">

        </div>
          <ul class="nav-bar">
            <li><a href="signin" class="iniciar-btn">Iniciar Sesión</a></li>
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

              <div class="form-generico">
                <form action="{{ route('login') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                    <input type="text" name="email" placeholder="E-Mail" id="email" value="{{ old('email') }}"  autofocus>
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                    <input type="password" name="password" placeholder="Contraseña">
                  </div>
                  <input type="checkbox" name="recordarme" id="recordarme"  {{ old('remember') ? 'checked' : '' }}>
                  <label for="recordarme">Recordarme</label>
                  <input type="submit" name="" value="INICIAR SESIÓN">
                  <input type="checkbox" name="popup" style="display:none" checked>
                </form>
              </div>
              <a href="{{ route('password.request') }}">¿Olvidaste tu e-mail o contraseña?</a>
              <a href="{{ route('register') }}">¿Aún no estás registrado?</a>
              <div class="login-separador">
                <span>O</span>
              </div>
              <a href="#" class="facebook-login-button">Iniciar sesion con Facebook</a>
              <a href="#" class="google-login-button">Iniciar sesión con Google</a>
            </section>
          </div>
        </div>
        @endguest

      </header>

    @yield('content')
    <div class="clear"></div>

    <footer class="main-footer">
      <div class="main-footer-div-left">
        <h4>Empresa</h4>
        <ul>
          <li><a href="mantenimiento">¿Quiénes somos?</a></li>
          <li><a href="mantenimiento">Contacto</a></li>
        </ul>
      </div>
      <div class="main-footer-div-right">
        <h4>Ayuda</h4>
        <ul>
          <li><a href="#comofunciona">¿Cómo funciona?</a></li>
          <li><a href="/faqs">FAQs</a></li>
          <li><a href="mantenimiento">Términos y condiciones</a></li>
          <li><a href="mantenimiento" class="last">Políticas de privacidad</a></li>
        </ul>
      </div>
    </footer>
    <section class="redes-sociales">
      <div class="facebook">
        <a href="https://www.facebook.com/Estacionarte-352116461897716/" target="_blank"><img src="/icons/facebook.png" alt=""></a>
      </div>
      <div class="twitter">
        <a href="http://twitter.com" target="_blank"><img src="/icons/twitter.png" alt=""></a>
      </div>
      <div class="instagram">
        <a href="http://instagram.com" target="_blank"><img src="/icons/instagram.png" alt=""></a>
      </div>
    </section>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  {{-- HAMURGUESA --}}
  <script>

    $('#toggle').click(function (){
      $(this).toggleClass("on");
      $('.nav-bar').slideToggle(100);
    });

  </script>

  {{-- ABRIR POPUP --}}
  <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";}

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";}
  </script>


  {{-- VALIDAR LOGIN --}}
  <script type="text/javascript">

    window.onload = function () {

      var form = document.forms[0];
      form.addEventListener("submit", submitForm);
    }

    function submitForm (event) {
      // event.preventDefault();

      var elementos = this.length;

      for (var i = 0; i < elementos; i++) {
        var elemento = this[i];

        if (!elemento.value) {
          alert('El campo "' + elemento.name + '" es obligatorio');
        }
        if (elemento.type == 'submit') { continue; }
      }
      var regex =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
      var email = document.getElementById("email").value;
      if( !(regex.test(email)) ) {
        alert('Debe ingresar un correo válido');
      }
    }
  </script>


  {{-- STICKY FIXED --}}
  {{-- <script type="text/javascript">

  window.onscroll = function() {myFunction()};

  var header = document.getElementById("sticky-form");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
  </script> --}}

  </body>
</html>
