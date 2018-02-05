<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Estacionados</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Raleway|Roboto" rel="stylesheet">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" id="hojaDeEstilo">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113241679-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-113241679-1');
  </script>
</head>

<body class="coming-soon">

  <div class="comingsoon-container">

    <div class="logo-container">
      <img src="images/logo_dos.png" class="comming-logo">
    </div>


    {{-- <div class="redes-container">

      <section class="redes"> --}}
        {{-- <div class="fa">
          <a href="https://www.facebook.com/Estacionarte-352116461897716/" target="_blank"><img src="/icons/facebook.png" alt=""></a>
        </div> --}}
        {{-- <div class="tw">
          <p>Seguinos</p>
          <a href="http://twitter.com" target="_blank"><img src="/images/twitter.png" alt=""></a>
        </div> --}}
        {{-- <div class="ig">
          <a href="http://instagram.com" target="_blank"><img src="/icons/instagram.png" alt=""></a>
        </div> --}}
      {{-- </section>
    </div> --}}

    <div class="title-container">
      <h1>¡La plataforma online para estacionar que estabas esperando!</h1>
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
      <button type="button" class="btn btn-warning"><a href="/anfitrion">Hacé click acá y enterate</a></button>
    </div>

    <div class="clear"></div>

    <div class="contacto-container">
      <h5>Dejanos tus datos y se el primero en tener acceso</h5>

      <article class="form-generico form-group">
          <form class="credits-form" action="{{ route('suscribir') }}" method="post">
            {{ csrf_field() }}

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" name="name" placeholder="Nombre y Apellido" value="">
            </div>

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input type="email" name="email" placeholder="E-Mail" id="credit-email">
            </div>

            <input type="submit" name="" value="SUSCRIBITE">
          </form>
      </article>
    </div>
    <div class="nosotros">
      <h4><a href="/nosotros">Acerca de nosotros</a></h4>
    </div>

  </div>


<script>
// Fecha de lanzamiento
var countDownDate = new Date("feb 28, 2018 23:59:59").getTime();

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
</script>

</body>
</html>
