<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Estacionados</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Raleway|Roboto" rel="stylesheet">

  {{-- jquery --}}
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="{{ asset('css/main.css') }}" rel="stylesheet" id="hojaDeEstilo">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
</head>

<body class="coming-soon">

  <div class="comingsoon-container">

    <div class="logo-container">
      <img src="images/logo/otros/StandardSmallLogo-Large.png" class="coming-logo">
    </div>

    <div class="title-container">
      <h1>¡La plataforma online para estacionar<br> que estabas esperando!</h1>
      <h2><b>ESTACIONADOS</b> conecta dueños de espacios con conductores para que estos dejen su vehículo en manos confiables de modo rápido, seguro y a buen precio.</h2>
    </div>

    <div class="countdown-container">


      <h2>Coming Soon</h2>

      <div class="reloj-container">
        <p id="dia" style="border-left: solid 1px white;"></p>
        <p id="hora"></p>
        <p id="minuto"></p>
        <p id="segundo"></p>
      </div>

      <div class="letras-container">
        <h4 id="dialetra">D</h4>
        <h4>H</h4>
        <h4>M</h4>
        <h4>S</h4>
      </div>

      <h3>Ya podés subir tu espacio</h3>
      <h6>Convertite en anfitrión y empezá a ganar dinero. ¿Cómo hago?</h6>
      <div style="text-align:center;">
        <a href="/anfitrion" class="btn btn-warning">Enterate Acá</a>
      </div>
    </div>

    <div class="clear"></div>

    <div class="contacto-container">

      @if (!empty($registrado) && $registrado == 1)
        <h5 style="color:rgb(255, 89, 89); font-weight:bold; font-size:1em;">¡Gracias por dejarnos tus datos!</h5>
      @elseif (count($errors) > 0)
        <h5 style="color:rgb(255, 89, 89); font-weight:bold; font-size:1em;">¡Este e-mail ya fue ingresado!</h5>
      @else
        <h5>Dejanos tus datos y se el primero en tener acceso</h5>
      @endif


      <article class="form-generico form-group">
          <form class="credits-form" action="{{ route('suscribir') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="input-field col s4 offset-s2 m4 offset-m2 l4 offset-l2">
                  <input type="text" name="name" value="">
                  <label for="name">Nombre y Apellido</label>
              </div>
              <div class="input-field col s4 offset-s2 m4 offset-m1 l4 offset-l1">
                  <input id="lalala" type="email" name="email" value="" id="credit-email">
                  <label for="lalala">E-mail</label>
              </div>
            <div class="col s10 offset-s1 m10 offset-m1 offset-m1 l10 offset-l1">
              <input type="submit" name="" value="SUSCRIBITE">
            </div>
          </div>
          </form>
      </article>
    </div>

    <div class="nosotros">
      <h4><a href="/nosotros">Acerca de nosotros</a></h4>
    </div>

    <div class="redes-container">

      <section class="redes">
        {{-- <div class="fa">
          <a href="https://www.facebook.com/Estacionarte-352116461897716/" target="_blank"><img src="/icons/facebook.png" alt=""></a>
        </div> --}}
        <div class="tw">
          {{-- <p>Seguinos</p> --}}
          <a href="http://twitter.com/estacionadosweb" target="_blank"><img src="/images/twitter.png" alt=""></a>
        </div>
        {{-- <div class="ig">
          <a href="http://instagram.com" target="_blank"><img src="/icons/instagram.png" alt=""></a>
        </div> --}}
      </section>
    </div>

  </div>


  <script src="{{ URL::asset('js/jquery.min.js')}}"></script>
  <script src="js/materialize.min.js"></script>

<script>
// Fecha de lanzamiento
var countDownDate = new Date("july 17, 2018 23:59:59").getTime();

// Calculo el intervalo cada 1 segundo
var x = setInterval(function() {

    // Tomo la fecha del momento en que estoy
    var now = new Date().getTime();

    // Guardo la diferencia entre la fecha de ahora y la de lanzamiento
    var distance = countDownDate - now;

    // Calculo el tiempo para el dia, hora, minutos y segundos
    var dias = Math.floor(distance / (1000 * 60 * 60 * 24));
    var horas = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutos = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var segundos = Math.floor((distance % (1000 * 60)) / 1000);

    // Muestro las fechas resultantes
    document.getElementById("dia").innerHTML = dias;
    document.getElementById("hora").innerHTML = horas;
    document.getElementById("minuto").innerHTML = minutos;
    document.getElementById("segundo").innerHTML = segundos;

    // Si la cuenta regresiva terminó
    // if (distance < 0) {
    //     clearInterval(x);
    //     document.getElementById("").innerHTML = "";
    // }

}, 1000);

//***************WHATSAPP

(function () {
        var options = {
            whatsapp: "+54 911 6800 5122", // WhatsApp number
            company_logo_url: "//static.whatshelp.io/img/flag.png", // URL of company logo (png, jpg, gif)
            // greeting_message: "Hola en que puedo ayudarte?", // Text of greeting message
            call_to_action: "Lun a Vier 9.30 a 18hs", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();

</script>

</body>
</html>
