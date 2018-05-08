@extends('layouts.app')
@section('title')Estacionados @endsection
@section('content')

<section class="banner-container">
  
  <article class="shape">
    <h2>Encontrá y reservá lugar para tu vehículo</h2>
    <h3>//Más de 10.000 usuarios ya confían en nosotros QUE PONEMOS ACA?//</h3>

    <div class="form-generico">
      <form class="search-espacios-form" action="{{ route('show.search')}}" method="get" onsubmit="return validarForm();">
        <div class="" id="dir_y_vehiculo">
          <input type="search" name="search-espacios-input-direccion" placeholder="Ejemplo: Balcarce 50 CABA">
          <select name="search-espacios-vehiculo">
            <option value="Automóvil" selected>Auto</option>
            <option value="Motocicleta">Moto</option>
            <option value="Bicicleta">Bicicleta</option>
          </select>
        </div>
        <div class="search-horario">
          <h5>Llegada</h5>
          <input type="date" name="search-espacios-dia-comienzo" value="" min="">
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
        <div class="row">
          <div class="col s12 boton">
              <button id="enviar" class="btn waves-effect waves-light" type="submit" name="buscar">Buscar
                  <i class="material-icons right">search</i>
              </button>
          </div>
      </div>
      </form>
    </div>

  </article>
</section>

<section class="como-funciona" id="comofunciona">
  <h2>¿Cómo funciona?</h2>
  <p class="sub-buscas">Si necesitás alquilar una cochera, ingresá a Estacionados, encontrá ofertas cercanas a tu destino y seleccioná tu favorita. Vas a poder comparar precios, ver imágenes, calificaciones y comentarios de otros usuarios.</p>
  <article class="pasos" id="pasos-1">
    <img class="paso-img" src="images/home/busqueda.png" alt="buscar">
    <h3 class="buscas">BUSCÁS</h3>
    <p>Elegí entre las cocheras disponibles en cualquier momento del día.</p>
  </article>
  <article class="pasos" id="pasos-2">
    <img class="paso-img" src="images/home/credit-card.png" alt="tarjeta">
    <h3 class="alquilas">ALQUILÁS</h3>
    <p>Reservá la opción que mejor se adapte a lo que necesitás y pagá a través de Mercado Pago. ¡No más problemas de efectivo!</p>
  </article>
  <article class="pasos" id="pasos-3">
    <img class="paso-img" src="images/home/car.png" alt="auto">
    <h3 class="estacionas">ESTACIONÁS</h3>
    <p>Conducí hasta el espacio y dejá tu vehiculo. ¡Listo! Ya es tuyo por el tiempo que lo solicitaste.</p>
  </article>

  <div class="clear"></div>

  <article class="ser-anfitrion-home">
    <div class="sombra">
      <h2>Ser Anfitrión con Estacionados</h2>
      <img class="celular" src="/images/home/celular.png" alt="celular">
      <p>Ese espacio de tu hogar que tenés sin aprovechar, podés convertirlo en dinero cuando no lo estes usando. Cargá tu espacio de estacionamiento con Estacionados y sé recompensado por ayudar a los conductores de tu ciudad.<br>Vos tenés el control:</p>
      <div class="anfitrion-pasos">
        <img class="icono" src="icons/reloj.png" alt="reloj">
        <p>Cargás tu espacio en minutos</p>
      </div>
      <div class="anfitrion-pasos">
        <img class="icono" src="icons/ajustes.png" alt="tarifa">
        <p>Gestioná la tarifa mas apropiada a tus necesidades, disponibilidad y detalles que creas necesarios</p>
      </div>
      <div class="anfitrion-pasos">
        <img class="icono" src="icons/dinero.png" alt="dinero">
        <p>Ganá dinero sin trabajo adicional</p>
      </div>
      <p><a href="/anfitrion" class="btn btn-default">Conocer más sobre ser <strong>Anfitrión</strong></a></p>
    </div>
  </article>

  <article class="comunidad-home">
    <h2>Estacionados es más que una aplicación para estacionar. <br> Es una comunidad </h2>
    <p>Estacionados conecta a las personas que buscan estacionamiento con personas que tienen un espacio para compartir. ¿Vas a un recital, vas la cancha? Ganale a la multitud reservando tu espacio de estacionamiento por adelantado. ¿Tenés un espacio extra en tu entrada? ¡Compartilo en Estacionados y comienzá a ganar dinero extra hoy! Con nuestra plataforma podés enumerar un espacio en minutos y reservar uno aún más rápido.</p>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vE82h15Yhl0" allowfullscreen></iframe>
    </div>
  </article>

  <article class="ser-anfitrion-home">
    <div class="sombra">
      <h2>Encontrá tu espacio con Estacionados</h2>
      <img class="celular" src="/images/home/celular.png" alt="celular">
      <p>No mas tiempo perdido dando vueltas buscando donde estacionar.<br> Simplemente elegis, reservas y estacionás.<br>Estacionados te facilita la comparación de precios, disponibilidad y reputación de usuarios en tiempo real.</p>
      <div class="anfitrion-pasos">
        <img class="icono" src="icons/calendario.png" alt="reloj">
        <p>Reservá ese estacionamiento donde vos lo necesitas por adelantado</p>
      </div>
      <div class="anfitrion-pasos">
        <img class="icono" src="icons/comparar.png" alt="tarifa">
        <p>Compará los precios y disponibilidad en tiempo real</p>
      </div>
      <div class="anfitrion-pasos">
        <img class="icono" src="icons/dinero.png" alt="dinero">
        <p>Extendé tu reserva en caso de que lo necesites</p>
      </div>
      <p><a href="/anfitrion" class="btn btn-default">Conocer más sobre cómo <strong>Estacionar</strong></a></p>
    </div>
  </article>

  <h2>Últimos espacios registrados</h2>
  <div class="owl-carousel owl-dots owl-theme owl-loaded" id="slider-home">
    <div class="item owl-dot active">
      <article class="item-contenedor">
        <a href="faqs"><img class="ultimo-espacio-img" src="/storage/espacios/33-1.jpeg"></a>
        <h3><strong>$ 220.00 ARS</strong> x día</h3>
        <h4>Cochera a metros del hipodromo</h4>
        <img class="stars" src="/images/home/stars.png">
      </article>
    </div>
    <div class="item owl-dot">
      <article class="item-contenedor">
        <a href="faqs"><img class="ultimo-espacio-img" src="/storage/espacios/1-1.jpeg"></a>
        <h3><strong>$ 220.00 ARS</strong> x día</h3>
        <h4>Cochera a metros del hipodromo</h4>
        <img class="stars" src="/images/home/stars.png">
      </article>
    </div>
    <div class="item owl-dot">
      <article class="item-contenedor">
        <a href="faqs"><img class="ultimo-espacio-img" src="/storage/espacios/3-1.jpeg"></a>
        <h3><strong>$ 220.00 ARS</strong> x día</h3>
        <h4>Cochera a metros del hipodromo</h4>
        <img class="stars" src="/images/home/stars.png">
      </article>
    </div>
    <div class="item owl-dot">
      <article class="item-contenedor">
        <a href="faqs"><img class="ultimo-espacio-img" src="/storage/espacios/33-1.jpeg"></a>
        <h3><strong>$ 220.00 ARS</strong> x día</h3>
        <h4>Cochera a metros del hipodromo</h4>
        <img class="stars" src="/images/home/stars.png">
      </article>
    </div>
    <div class="item owl-dot">
      <article class="item-contenedor">
        <a href="faqs"><img class="ultimo-espacio-img" src="/storage/espacios/33-1.jpeg"></a>
        <h3><strong>$ 220.00 ARS</strong> x día</h3>
        <h4>Cochera a metros del hipodromo</h4>
        <img class="stars" src="/images/home/stars.png">
      </article>
    </div>
  </div>


    {{-- <div class="mejores-espacios-container">
      <h2>Nuestros espacios con mejor reputación</h2>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 220.00 ARS</strong> x día</h3>
          <h4>Cochera a metros del hipódromo</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/espacio-3.jpg"></a>
          <h3><strong>$ 15.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en edificio</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-2.jpg"></a>
          <h3><strong>$ 100.00 ARS</strong> x día</h3>
          <h4>Cochera descubierta con reja</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/espacio-1.jpg"></a>
          <h3><strong>$ 20.00 ARS</strong> x hora</h3>
          <h4>Cochera en edificio residencial</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/espacio-2.jpg"></a>
          <h3><strong>$ 20.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta Recoleta</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 20.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en Palermo</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
    </div> --}}

    {{-- <div class="container container-title-carousel fondo-carousel">
      <h2>Últimos espacios registrados</h2>
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
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="perfil"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 220.00 ARS</strong> x día</h3>
          <h4>Cochera a metros del hipodromo</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="perfil"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 220.00 ARS</strong> x día</h3>
          <h4>Cochera a metros del hipodromo</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
      </div>

      <div class="item">
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 15.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en edificio</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 15.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en edificio</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 15.00 ARS</strong> x hora</h3>
          <h4>Cochera cubierta en edificio</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
      </div>

      <div class="item">
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 100.00 ARS</strong> x día</h3>
          <h4>Cochera descubierta con reja</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 100.00 ARS</strong> x día</h3>
          <h4>Cochera descubierta con reja</h4>
          <img class="stars" src="/images/home/stars.png">
        </article>
        <article class="mejor-espacio-bloque">
          <a href="#"><img class="mejor-espacio" src="/storage/espacios/33-1.jpeg"></a>
          <h3><strong>$ 100.00 ARS</strong> x día</h3>
          <h4>Cochera descubierta con reja</h4>
          <img class="stars" src="/images/home/stars.png">
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
</div> --}}
</section>



@endsection

@section('scripts')
  <script src="{{ URL::asset('js/home.js')}}"></script>
  <script type="text/javascript">
  				$('.form_date').datetimepicker({
  			        language:  'es',
  			        weekStart: 1,
  			        todayBtn:  1,
  					autoclose: 1,
  					todayHighlight: 1,
  					startView: 2,
  					minView: 2,
  					forceParse: 0
  			    });
  				$('.form_time').datetimepicker({
  			        language:  'es',
  			        weekStart: 1,
  			        todayBtn:  0,
  					autoclose: 1,
  					todayHighlight: 0,
  					startView: 1,
  					minView: 0,
  					maxView: 1,
  					forceParse: 0,
  					minuteStep: 15
  			    });
  			</script>
@endsection
