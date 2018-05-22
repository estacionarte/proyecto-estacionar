@extends('layouts.app')
@section('title') Resultados de búsqueda @endsection
@section('leaflet')
  <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css')}}">
  <script src="{{ URL::asset('js/leaflet.js')}}"></script>
@endsection
@section('content')

<div class="container" style="padding:0px 5px;">

  <div class="como-funciona">

    <section class="search-result">
        <h1>Resultados de búsqueda</h1>
      <div id="mapid" class="searchresults-map">

      </div>
      <div class="mejores-espacios-container">

      {{-- @forelse ($espacios as $espacio)
        <article class="mejor-espacio-bloque" id="{{ $espacio->id }}">
          <a href="{{ route('show.espacio', $espacio->id) }}"><img class="mejor-espacio" src="/storage/espacios/{{ $espacio->fotos->first()->photoname}}" alt=""></a>
          <h3>{{ 'Precio Final: $' . $espacio->precioFinal($fechallegada, $fechapartida)}}</h3>
          <h4>{{ $espacio->direccion }}</h4>
          <h4>{{ $espacio->tipoEspacio }}</h4>
          <img class="stars" src="/images/home/stars.png">
          <div class="mejor-espacio-botones">
            <a class="mejor-espacio-boton-alquilar" id="btn{{ $espacio->id }}">Alquilar</a>
            <a href="{{ route('show.espacio', $espacio->id) }}" class="mejor-espacio-boton-vermas">Ver Más</a>
            @include('_modal-alquilar')
          </div>
        </article> --}}
        <div class="owl-carousel owl-dots owl-theme owl-loaded" id="slider-search-results">
          @forelse ($espacios as $espacio)
          <div class="item owl-dot active" id="{{ $espacio->id }}">
            <article class="item-contenedor">
              <a href="{{ route('show.espacio', $espacio->id) }}"><img class="ultimo-espacio-img" src="/storage/espacios/{{ $espacio->fotos->first()->photoname}}"></a>
              <h3>{{ 'Precio Final: $' . $espacio->precioFinal($fechallegada, $fechapartida)}}</h3>
              <h4>{{ $espacio->direccion }}</h4>
              <h4>{{ $espacio->tipoEspacio }}</h4>
              <img class="stars" src="/images/home/stars.png">
              <div class="mejor-espacio-botones">
                <a class="mejor-espacio-boton-alquilar" id="btn{{ $espacio->id }}">Alquilar</a>
                <a href="{{ route('show.espacio', $espacio->id) }}" class="mejor-espacio-boton-vermas">Ver Más</a>
                @include('_modal-alquilar')
              </div>
            </article>
          </div>
        </div>
      @empty
        <p>No hay espacios disponibles con estos criterios de búsqueda</p>
        <p>Intenta buscando en otra zona o en otros horarios</p>
      @endforelse

        <div class="clear">
        	{{-- {{ $espacios->links() }} --}}
        </div>
      </div>
    </section>
  </div>
</div>

@endsection

@section('scripts')

  <script>
  // carrousel (si la busqueda trae varios espacios se ve en modo carrousel)
  $('#slider-search-results').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:4000,
    // animateOut: 'fadeOut',
    autoHeight: false,
    responsive:{
          0:{
              items:1
          },
          760:{
              items:2
          },
          1024:{
              items:3
          }
      }
  })
  </script>

  <script>
  // Obtengo dirección ingresada por usuario que uso para geocoding
  var direccion = {!! json_encode($direccion) !!};
  // Obtengo espacios para usar con js
  var espacios = {!! json_encode($espacios) !!};
  </script>

  <script src="{{ URL::asset('js/search-results.js')}}"></script>

  <script src="{{ URL::asset('js/modal-alquilar.js')}}"></script>

  <script type="text/javascript">
  // Para que no se pueda mandar form al apretar enter
    window.addEventListener('keypress', function(e) {
      var x = e.keyCode
        if (x == 13) {
            if (e.target.nodeName == 'INPUT' && e.target.type == 'date') {
                e.preventDefault();
                return false;
            }
            if (e.target.nodeName == 'SELECT') {
                e.preventDefault();
                return false;
            }
        }
    }, true);
</script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkuJOGY0hwpTRHHsCoxPLc_1Bcv_sUIHk&v=3&callback=initMap">
  </script>
@endsection
