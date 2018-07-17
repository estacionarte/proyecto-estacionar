<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {{-- <title>{{ config('app.', 'Estacionados') }}</title> --}}

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

    {{-- fontawesome --}}
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    {{-- BOOSTRAP ICONS--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     {{-- jquery --}}
     <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

     {{-- CAROUSEL DE BOOSTRAP--}}
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     {{-- Materialize framework --}}
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113241679-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-113241679-1');
    </script>

    <!-- Global site tag (gtag.js) - Google AdWords: 817436236 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-817436236"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-817436236');
    </script>

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@estacionadosweb" />
    <meta name="twitter:title" content="Estacionados" />
    <meta name="twitter:description" content="¡Plataforma online para alquilar estacionamiento!" />
    <meta name="twitter:image" content="https://i.imgur.com/mMojlEG.jpg" />

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    @yield('css')

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#085174">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#085174">

    {{-- Scripts --}}
    @yield('leaflet')
  </head>
  <body>
    <header class="main-header" id="element">

        <div class="header-logo-container">
          <a href="/"><img src="/images/logo/standard/standar-small.png" alt="logotipo" class="logo"></a>
        </div>


      @auth

        <nav class="main-nav">
          {{-- <div class="clear"></div> --}}
          <div class="avatar-container">

            {{-- FOTO DE PERFIL DE USUARIO --}}
            <i class="fas fa-caret-left" onclick="openNav()"></i>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()"><img class="avatar" src="/storage/profilePic/{{Auth::user()->profilePic}}" alt="avatar"></span>

            {{-- NOMBRE DE PERFIL DE USUARIO --}}
            {{-- <span class="welcome-user" onclick="openNav()"><h4>{{Auth::user()->firstName}} {{Auth::user()->lastName}}</h4></span> --}}

            <a href="/anfitrion" class="anfitrion-btn"> Convertite en anfitrión</a>

          </div>


          <div class="clear"></div>

          {{-- MENÚ LATERAL --}}
          <div id="mySidenav" class="sidenav">
            <div class="sidenav-img">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="/images/icons/sidenav-close.png" alt=""></a>
              <h4>{{Auth::user()->firstName}} {{Auth::user()->lastName}}</h4>
              <h5>{{Auth::user()->email}}</h5>
              {{-- <img src="/images/sidenav-top.png" alt=""> --}}
            </div>
            <div class="sidenav-listado">
              <a href="{{ route('profile') }}" class=""><img src="/images/icons/sidenav-perfil.png" alt=""> Mi perfil</a>
              <a href="/anfitrion" class=""><img src="/images/icons/sidenav-anfitrion.png" alt=""> Convertite en anfitrión</a>
              <a href="faqs" class=""><img src="/images/icons/sidenav-ayuda.png" alt=""> Ayuda</a>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class=""><img src="/images/icons/sidenav-salir.png" alt=""> Salir</a>
            </div>
          </div>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      @endauth

      @guest

        <a href="#menu" id="toggle"><span></span></a>

        <div class="clear-toggle"></div>

          <ul class="nav-bar" id="lol">
            <li><a href="signin" class="iniciar-btn">Iniciar Sesión</a></li>
            <li><a href="#popup-iniciar" class="popup-link">Iniciar Sesión</a></li>
            <li><a href="signup" class="register-btn">Registrarse</a></li>
            <li class="ayuda-li"><a href="faqs" class="faq-btn">Ayuda</a></li>
            <li><a href="/anfitrion" class="anfitrion-btn" id="anfitrion">Convertite en anfitrión</a></li>
            <li><a href="#comofunciona" class="how-btn">¿Como funciona?</a></li>

          </ul>
        </nav>

        <div class="clear"></div>

        <div class="modal-wrapper" id="popup-iniciar">
          <div class="popup-contenedor">
            <div class="titulo-container">
              <a class="popup-cerrar" href="#">X</a>
              <h2 class="title-signin">Iniciar sesión</h2>
            </div>

            <section class="signin-popup">
              <div class="form-generico">
                <form action="{{ route('login') }}" method="post">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="input-field col s12">
                      <input type="text" name="email" id="popup-email" value="{{ old('email') }}">
                      <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12">
                      <input type="password" name="password" id="popup-pass" value="{{ old('password') }}">
                      <label for="password">Contraseña</label>
                    </div>
                    <div class="switch">
                       <label>
                         <input type="checkbox"  name="recordarme" value="recordarme" {{ old('recordarme') ? 'checked' : '' }}>
                         <span class="lever"></span>
                         Recordarme
                       </label>
                    </div>
                  </div>
                  <div class="row" id="loaders">
                      <img id="spinner" src="/images/spinner.gif" width="150">
                  </div>
                  <div class="row">
                    <div class="col s12 offset-s1 boton">
                        <button id="popup-enviar" class="btn waves-effect waves-light  pink darken-2" type="submit" name="boton-submit">INICIAR SESIÓN
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
                  <input type="checkbox" name="popup" style="display:none" checked>
                </form>
              </div>
              <a href="{{ route('password.request') }}">¿Olvidaste tu e-mail o contraseña?</a>
              <a href="{{ route('register') }}">¿Aún no estás registrado?</a>
              <div class="login-separador">
                <span>O</span>
              </div>
              <div class="pop-redes">
                <a href="login/facebook" class="facebook-login-button">Iniciar sesión con Facebook</a>
                <a href="login/google" class="google-login-button">Iniciar sesión con Google</a>
              </div>
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
          <li><a href="/nosotros">Nosotros</a></li>
          <li><a href="mailto:info@estacionados.com">info@estacionados.com</a></li>
        </ul>
      </div>
      <div class="main-footer-div-right">
        <h4>Ayuda</h4>
        <ul>
          <li><a href="#comofunciona">¿Cómo funciona?</a></li>
          <li><a href="/faqs">FAQs</a></li>
          <li><a href="mantenimiento">Términos y condiciones</a></li>
          <li><a href="politica-y-privacidad" class="last">Políticas de privacidad</a></li>
        </ul>
      </div>
    </footer>
    {{-- <section class="redes-sociales">
      <div class="facebook">
        <a href="https://www.facebook.com/Estacionarte-352116461897716/" target="_blank"><img src="/icons/facebook.png" alt=""></a>
      </div>
      <div class="twitter">
        <a href="http://twitter.com" target="_blank"><img src="/icons/twitter.png" alt=""></a>
      </div>
      <div class="instagram">
        <a href="http://instagram.com" target="_blank"><img src="/icons/instagram.png" alt=""></a>
      </div>
    </section> --}}


    <script src="{{ URL::asset('js/jquery.min.js')}}"></script>

    <script src="{{ URL::asset('js/owl.carousel.js')}}"></script>

    <script src="{{ URL::asset('js/materialize.min.js')}}"></script>

    <script src="{{ URL::asset('js/wow.min.js')}}"></script>

    <script>
      new WOW().init();
    </script>


  {{-- POPUP-LOGIN --}}
  <script src="js/popup-signin.js"></script>

  {{-- HAMURGUESA --}}
  <script>

  // $(document).ready(function(){
  //   $('.sidenav').sidenav();
  // });


    $('#toggle').click(function (){
      $(this).toggleClass("on");
      $('.nav-bar').slideToggle(100);
    });

  </script>

  {{-- ABRIR POPUP --}}
  <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
      }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      // document.body.style.backgroundColor = "white";
    }

      // var elementPosition = $('#element').offset();

// $(window).scroll(function(){
//    if($(window).scrollTop() > 500){
//       $('#element').css({'position':'fixed', 'zIndex':'99999'});
//       $('#lol').css({'backgroundColor':'pink'});
//    } else {
//       $('#element').css('position', 'static');
//       $('#lol').css({'backgroundColor':'#fff'});
//    }
// });

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

  @yield('scripts')

  </body>
</html>
