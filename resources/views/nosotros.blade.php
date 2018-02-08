{{-- @extends('layouts.app')
@section('title') Nosotros @endsection
@section('content') --}}
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Estacionados - Nosotros</title>
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

  </body>
</html>
<div class="nosotros-container">
    <div class="nosotros-titulo">
      <div class="nos-tit-container">
        <h1>Acerca de nosotros</h1>
        <p><b>Estacionados</b> nace como respuesta a los diversos problemas para encontrar estacionamiento, desde el tiempo perdido hasta la seguridad y los precios. Conecta a las personas que quieren ofrecer su espacio con aquellas que necesitan un lugar para su vehículo, generando valor para ambas partes.</p>
        <p>Nuestro objetivo es facilitar el estacionamiento y generar ahorros a los conductores, y al mismo tiempo ayudar a los propietarios y operadores de estacionamiento a obtener grandes beneficios.</p>
      </div>
    </div>
  <div class="nosotros-foto-contanier">
    <article class="nosotros-foto joaquin">
      <img src="/images/nosotros/joaquin.jpg">
      <h4>CO-FOUNDER</h4>
      <h2>Joaquín Paños</h2>
      <p>joaquin@estacionados.com</p>
      <a href="https://www.linkedin.com/in/joapanos/" target="_blank">in</a>
    </article>
    <article class="nosotros-foto trufa">
      <img src="/images/nosotros/mariano.jpg">
      <h4>CO-FOUNDER</h4>
      <h2>Mariano Alvarez Hayes</h2>
      <p>mariano@estacionados.com</p>
      <a href="https://www.linkedin.com/in/mariano-alvarez-developer/" target="_blank">in</a>
    </article>
  </div>
</div>

{{-- @endsection --}}
