@extends('layouts.app')
@section('title') Ser Anfitrión @endsection
@section('content')
  <div class="anfitrion">
    <div class="banner-anfitrion-container">
      <div class="title-anfitrion-container">
        <h3>Tu Espacio en Estacionados</h3>
        <h1>Ganá dinero como anfitrión de Estacionados</h1>
        <a class="btn btn-danger" href="/register" role="button">Comenzar</a>
      </div>
    </div>

    <div class="resumen-anfitrion-container">
      <article id="resumen1" class="resumen">
        <h1>¿Porqué alquilar mi espacio?</h1>
        <p>No importa qué tipo de espacio tengas para compartir, Estacionados hace que ganar dinero y llegar a cientos de conductores que buscan lugares únicos para estacionar, como el tuyo, resulte simple y seguro.</p>
      </article>
      <article class="resumen">
        <h1>Vos tenés el control</h1>
        <p>Con Estacionados, tenés completo control de tu disponibilidad, precios, reglas de tu espacio y cómo interactúas con los conductores. Podés establecer las horas de llegada y manejar el proceso de la forma que quieras.</p>
      </article>
      <article class="resumen">
        <h1>Estamos ahí para ayudarte en todo el proceso</h1>
        <p>Estacionados ofrece herramientas, consejos de seguridad, servicios de atención al cliente los 7 días de la semana.</p>
      </article>
    </div>

    <div class="pasos-anfitrion-container">
      <h1>¿Cómo ser anfitrión de Estacionados?</h1>
      <article class="ser-anfitrion">
        <img src="images/anfitrion/paso1.jpg">
        <h2>1. Creá un espacio</h2>
        <p>Crear un espacio en Estacionados es gratis y fácil. Describí tu espacio, indicá cuántos vehiculos podés alojar, agrega fotos y describí todos los detalles interesantes.
        Nuestra herramienta de precios puede recomendar precios competitivos, pero vos decidís qué precios fijar en tu espacio.</p>
      </article>
      <article class="ser-anfitrion">
        <img id="anfitrion-img-2" src="images/anfitrion/paso2.jpg">
        <h2 id="anfitrion-h2-2">2. Da la bienvenida al conductor</h2>
        <p id="anfitrion-p-2">Conoce a los conductores antes de su llegada intercambiando mensajes en nuestra plataforma.
        La mayoría de los anfitriones se ocupan de limpiar los espacios que usarán los conductores.
        Podés darles la bienvenida a los conductores y recibirlos en persona, o también podés enviarles por correo un código para la puerta.</p>
      </article>
      <article class="ser-anfitrion">
        <img src="images/anfitrion/paso3.jpg">
        <h2>3. Recibir el pago</h2>
        <p>El sistema de pago seguro de Estacionados permite que nunca tengas que tratar directamente con dinero.
        A los conductores se les cobra antes de la llegada, y vos recibís el pago automáticamente después de que los conductores llegan a tu espacio, menos una comisión por servicio del 3 %.
        Podés recibir tu dinero a través de Mercado Pago, PayPal, depósito directo o transferencia bancaria, entre otras formas de pago.</p>
      </article>
    </div>

    <div class="footer-anfitrion">
      <h1>Empezá a crear tu espacio</h1>
      <a class="btn btn-danger" href="/register" role="button">Comenzar</a>
    </div>


  </div>


@endsection
