@extends('layouts.app')
@section('title') Estacionapp @endsection
@section('content')
<section class="banner-container">
  <article class="shape">
    <h2>Encontrá y reservá lugar para tu vehículo</h2>
    <h3>Más de 10.000 usuarios ya confían en nosotros</h3>

    <div class="form-generico">
      <form class="search-espacios-form" action="{{ route('show.search')}}" method="get">
        <div class="" id="dir_y_vehiculo">
          <input type="search" name="search-espacios-input-direccion" placeholder="¿Dónde querés estacionar?">
          <select name="search-espacios-vehiculo">
            <option value="Auto" selected>Auto</option>
            <option value="Moto">Moto</option>
            <option value="Bicicleta">Bicicleta</option>
          </select>
        </div>
        <div class="search-horario">
          <h5>Llegada</h5>
          <input type="date" name="search-espacios-dia-comienzo" value="">
          <select name="search-espacios-hora-comienzo" class="search-espacios-hora">
            @for ($i=0; $i < 24; $i++)
              @if ($i<10)
                <option value={{ $i }}>0{{ $i }}</option>
              @else
                <option value={{ $i }}>{{ $i }}</option>
              @endif
            @endfor
          </select>
          <select name="search-espacios-minuto-comienzo" class="search-espacios-minuto">
            @for ($i=0; $i < 60; $i+=5)
              @if ($i<10)
                <option value={{ $i }}>0{{ $i }}</option>
              @else
                <option value={{ $i }}>{{ $i }}</option>
              @endif
            @endfor
          </select>
        </div>
        <div class="search-horario">
          <h5>Partida</h5>
          <input type="date" name="search-espacios-dia-fin" value="">
          <select name="search-espacios-hora-fin" class="search-espacios-hora">
            @for ($i=0; $i < 24; $i++)
              @if ($i<10)
                <option value={{ $i }}>0{{ $i }}</option>
              @else
                <option value={{ $i }}>{{ $i }}</option>
              @endif
            @endfor
          </select>
          <select name="search-espacios-minuto-fin" class="search-espacios-minuto">
            @for ($i=0; $i < 60; $i+=5)
              @if ($i<10)
                <option value={{ $i }}>0{{ $i }}</option>
              @else
                <option value={{ $i }}>{{ $i }}</option>
              @endif
            @endfor
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

  <div class="clear"></div>

    <div class="mejores-espacios-container">
      <h2>Nuestros espacios con mejor reputación</h2>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 220.00 ARS</strong> x día</h3>
          <h4>Cochera a metros del hipódromo</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/espacio-3.jpg"></a>
          <h3><strong>$ 15.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en edificio</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-2.jpg"></a>
          <h3><strong>$ 100.00 ARS</strong> x día</h3>
          <h4>Cochera descubierta con reja</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/espacio-1.jpg"></a>
          <h3><strong>$ 20.00 ARS</strong> x hora</h3>
          <h4>Cochera en edificio residencial</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/espacio-2.jpg"></a>
          <h3><strong>$ 20.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta Recoleta</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 20.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en Palermo</h4>
          <img class="stars" src="/images/stars.png">
        </article>
    </div>

    <div class="container container-title-carousel">
      <h2>Últimos usuarios registrados</h2>
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1" class="indicators.color"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>


    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <article class="mejor-espacio-bloque">
          <a href="faqs"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 220.00 ARS</strong> x día</h3>
          <h4>Cochera a metros del hipodromo</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="perfil"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 220.00 ARS</strong> x día</h3>
          <h4>Cochera a metros del hipodromo</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="perfil"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 220.00 ARS</strong> x día</h3>
          <h4>Cochera a metros del hipodromo</h4>
          <img class="stars" src="/images/stars.png">
        </article>
      </div>

      <div class="item">
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 15.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en edificio</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 15.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en edificio</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 15.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en edificio</h4>
          <img class="stars" src="/images/stars.png">
        </article>
      </div>

      <div class="item">
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 100.00 ARS</strong> x día</h3>
          <h4>Cochera descubierta con reja</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 100.00 ARS</strong> x día</h3>
          <h4>Cochera descubierta con reja</h4>
          <img class="stars" src="/images/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 100.00 ARS</strong> x día</h3>
          <h4>Cochera descubierta con reja</h4>
          <img class="stars" src="/images/stars.png">
        </article>
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</section>

<script type="text/javascript">
  document.querySelector("input[name='search-espacios-dia-comienzo']").valueAsDate = new Date();
  document.querySelector("input[name='search-espacios-dia-fin']").valueAsDate = new Date();
</script>

@endsection
