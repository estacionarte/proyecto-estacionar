@extends('layouts.app')
@section('title') Estacionapp @endsection
@section('body')
<section class="banner-container">
  <article class="shape">
    <h2>Encontrá y reservá tu estacionamiento privado</h2>
    <h3>Más de 10.000 usuarios ya confían en nosotros</h3>
    <div class="form-generico">
      <form action="" method="get">
        <input type="search" name="busqueda" value="" placeholder="¿Dónde querés estacionar?" required>
        <input type="submit" name="BUSCAR" value="BUSCAR">
      </form>
    </div>
  </article>
</section>

<section class="como-funciona" id="comofunciona">
  <h2>¿Cómo funciona?</h2>
  <article class="pasos">
    <img src="images/search.jpg" alt="buscar">
    <h3 class="buscas">BUSCÁS</h3>
    <p>Elegí entre las más de 50.000 cocheras disponibles en la ciudad de Buenos Aires en cualquier momento del día.</p>
  </article>
  <article class="pasos">
    <img src="images/credit-card.jpg" alt="tarjeta">
    <h3 class="alquilas">ALQUILÁS</h3>
    <p>Reservá la opción que mejor se adapte a lo que necesitás y pagá a través de nuestro sistema seguro. ¡No más problemas de efectivo!</p>
  </article>
  <article class="ultimo-paso">
    <img src="images/car.jpg" alt="auto">
    <h3 class="estacionas">ESTACIONÁS</h3>
    <p>Conducí hasta la cochera y dejá tu auto. ¡Listo! Ya es tuya por el tiempo que la solicitaste.</p>
  </article>
</section>
@endsection
