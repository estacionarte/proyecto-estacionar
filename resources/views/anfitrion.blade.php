<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Estacionados - Anfitriones</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" id="hojaDeEstilo">
  </head>
  <body>
    <div class="anfitrion">
      <div class="banner-anfitrion-container">
        <div class="title-anfitrion-container">
          <h3>Tu Espacio en Estacionados</h3>
          <h1>Ganá dinero como anfitrión de Estacionados</h1>
          <a class="btn btn-danger" role="button" id="comenzar1">Comenzar</a>

          <div class="modalAlquilar" style="{{ !empty($registrado) && $registrado == 1 || count($errors) > 0 ? ' display: block' : '' }}">
            <div class="modalAlquilar-content">
              <span class="alquilar-close">&times;</span>
              <h2>Enviar datos</h2>
              <h3 id="anfitrion-modal-h3">Dejanos tus datos y nos contactamos con vos para cargar tu espacio</h3>
              <hr>
              @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                  <p style="color: #990606;"> {{ $error }} </p>
                @endforeach
              @endif
              @if (!empty($registrado) && $registrado == 1)
                <h5 style="color:rgb(255, 89, 89); font-weight:bold; font-size:1em; text-align:center">¡Gracias por dejarnos tus datos!</h5>
              @endif
              <div class="form-generico">
                <form action="{{ route('datos.anfitrion') }}" method="post">
                  {{ csrf_field() }}
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" name="name" placeholder="Nombre y Apellido" maxlength="50">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                      <input type="email" name="email" placeholder="E-Mail" maxlength="100">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                      <input type="text" name="location" placeholder="Ciudad y Barrio" maxlength="100">
                    </div>
                    <div class="input-group">
                      <textarea name="informacion" maxlength="250" placeholder="Consultas y otros datos que consideres importantes para nosotros. Por ejemplo: n˚ de teléfono, disponibilidad horaria del espacio a ofertar, información sobre el mismo (casa, techado, altura), etc."></textarea>
                    </div>
                    <input type="submit" name="enviar" value="ENVIAR">
                </form>
              </div>
              <p>Te vamos a contactar en menos de 48 horas.</p>
              <h6 style="color:black; text-align:center;">info@estacionados.com</h6>
            </div>
          </div>

        </div>
      </div>

      <div class="resumen-anfitrion-container">
        <article id="resumen1" class="resumen">
          <h1>¿Por qué alquilar mi espacio?</h1>
          <p>Porque, sin importar qué tipo de espacio tengas para compartir, <b>Estacionados</b> hace que ganar dinero y llegar a cientos de conductores resulte simple y seguro. Podés ofrecer una cochera cuando no la uses o, simplemente, el living de tu casa para recibir bicicletas sin ninguna complicación.</p>
        </article>
        <article class="resumen">
          <h1>Vos tenés el control</h1>
          <p>Con <b>Estacionados</b>, tenés completo control de la disponibilidad, precios y reglas de tu espacio. Al recibir un pedido de reserva, disponibilizamos los datos del solicitante para que seas vos quien decida aceptar o rechazar el alquiler.</p>
        </article>
        <article class="resumen">
          <h1>Estamos ahí para ayudarte en todo el proceso</h1>
          <p><b>Estacionados</b> ofrece herramientas, consejos de seguridad y servicios de atención al cliente los 7 días de la semana.</p>
        </article>
      </div>

      <div class="pasos-anfitrion-container">
        <h1>¿Cómo ser anfitrión de Estacionados?</h1>
        <article class="ser-anfitrion">
          <img src="images/anfitrion/paso1.jpg">
          <h2>1. Creá un espacio</h2>
          <p>Crear un espacio en <b>Estacionados</b> es gratis y fácil. Describí tu espacio, indicá qué tipo de vehículo podés alojar, agregá fotos y describí todos los detalles que creas necesarios.</p>
          <p>Para terminar, indicá la disponibilidad de tu espacio y el precio que desees cobrar.</p>
        </article>
        <article class="ser-anfitrion">
          <img id="anfitrion-img-2" src="images/anfitrion/paso2.jpg">
          <h2 class="anfitrion-h2-2">2. Da la bienvenida al conductor</h2>
          <p class="anfitrion-p-2">Conocé a los conductores antes de su llegada intercambiando mensajes. Nosotros nos encargamos de proveer la información necesaria para que puedan comunicarse al concretar el alquiler.</p>
          <p class="anfitrion-p-2">La mayoría de los anfitriones se ocupan de limpiar y ordenar los espacios que usarán los conductores para que estén en buenas condiciones.</p>
          <p class="anfitrion-p-2">Podés darles la bienvenida a los conductores y recibirlos en persona, o también podés enviarles los datos que necesitan para poder dejar su vehículo al llegar.</p>
        </article>
        <article class="ser-anfitrion">
          <img src="images/anfitrion/paso3.jpg">
          <h2>3. Recibí el pago</h2>
          <p>Los pagos en <b>Estacionados</b> se realizan siempre online, lo que permite que nunca tengas que tratar directamente con dinero.</p>
          <p>A los conductores se les cobra antes de la llegada y vos recibís el pago después de que finalice el alquiler, tras asegurarnos de que todo transcurrió bien.</p>
          <p>El dinero se deposita directamente en tu cuenta bancaria.</p>
        </article>
      </div>

      <div class="footer-anfitrion">
        <h1>Empezá a crear tu espacio</h1>
        <a class="btn btn-danger" role="button" id="comenzar2">Comenzar</a>
      </div>

    </div>

    <script>
      modal = document.getElementsByClassName("modalAlquilar")[0];
      close = document.getElementsByClassName("alquilar-close")[0];
      btn1 = document.getElementById("comenzar1");
      btn2 = document.getElementById("comenzar2");

      btn1.onclick = function() {
        modal.style.display = "block";
      }
      btn2.onclick = function() {
        modal.style.display = "block";
      }
      close.onclick = function() {
        modal.style.display = "none";
      }
      window.addEventListener('click', function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      });

    </script>
  </body>
</html>
