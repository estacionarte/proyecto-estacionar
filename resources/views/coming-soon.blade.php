<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coming - Soon</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" id="hojaDeEstilo">
</head>

<body class="coming-soon">
  <div class="comingsoon-container">

    <img src="/images/logo_trans.png" class="comming-logo">

    <section class="redes">
      <div class="face">
        <a href="https://www.facebook.com/Estacionarte-352116461897716/" target="_blank"><img src="/icons/facebook.png" alt=""></a>
      </div>
      <div class="twit">
        <a href="http://twitter.com" target="_blank"><img src="/icons/twitter.png" alt=""></a>
      </div>
      <div class="inst">
        <a href="http://instagram.com" target="_blank"><img src="/icons/instagram.png" alt=""></a>
      </div>
    </section>

    <h1>COMING SOON</h1>

    <p id="dia"></p>
    <p id="hora"></p>
    <p id="minuto"></p>
    <p id="segundo"></p>
    <div class="clear" style="margin-bottom:-185px"></div>
    <h4 id="dialetra">D</h4>
    <h4>H</h4>
    <h4>M</h4>
    <h4>S</h4>


    <button type="button" class="btn btn-warning">Ya podes subir tu espacio</button>

    <h5>Dejanos un correo y nos ponemos en contacto con vos</h5>

    <article class="form-generico">
        <form class="credits-form" action="" method="post">
          <input type="email" name="email" placeholder="Ingresá un e-mail" id="credit-email">
          <input type="submit" name="" value="SUSCRIBITE">
        </form>
    </article>

  </div>


<script>
// Fecha de lanzamiento
var countDownDate = new Date("apr 31, 2018 23:59:59").getTime();

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
