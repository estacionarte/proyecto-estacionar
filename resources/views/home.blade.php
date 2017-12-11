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

    <div class="form-generico">
      <form class="search-espacios-form" action="" method="get">
        <div class="" id="dir_y_vehiculo">
          <input type="search" name="search-espacios-input-direccion" placeholder="¿Dónde querés estacionar?">
          <select name="search-espacios-vehiculo">
            <option value="">Vehículo</option>
            <option value="Auto">Auto</option>
            <option value="Moto">Moto</option>
            <option value="Bicicleta">Bicicleta</option>
          </select>
        </div>
        <div class="search-horario">
          <h5>Llegada</h5>
          <input type="date" name="" value="">
          <select name="search-espacios-hora-comienzo" class="search-espacios-hora">
            <option value=""></option>
          </select>
          <select name="search-espacios-minuto-comienzo" class="search-espacios-minuto">
          </select>
        </div>
        <div class="search-horario">
          <h5>Partida</h5>
          <input type="date" name="" value="">
          <select name="search-espacios-hora-fin" class="search-espacios-hora">

          </select>
          <select name="search-espacios-hora-fin" class="search-espacios-minuto">

          </select>
        </div>
        <button type="submit" name="search-espacios-submit"><i class="fa fa-search"></i></button>
        <input type="submit" name="BUSCAR" value="BUSCAR">
      </form>
    </div>

  </article>
</section>

<section class="como-funciona" id="comofunciona">
  <h2>¿Cómo funciona?</h2>
  <p class="sub-buscas">Si necesitás alquilar una cochera, ingresá a Estacionapp, encontrá ofertas cercanas a tu destino y seleccioná tu favorita. Vas a poder comparar precios, ver imágenes, calificaciones y comentarios de otros conductores.</p>
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
  <article class="pasos">
    <img src="images/car.jpg" alt="auto">
    <h3 class="estacionas">ESTACIONÁS</h3>
    <p>Conducí hasta la cochera y dejá tu auto. ¡Listo! Ya es tuya por el tiempo que la solicitaste.</p>
  </article>
  <div class="clear">

  </div>
</section>
@endsection
