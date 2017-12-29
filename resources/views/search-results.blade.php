@extends('layouts.app')
@section('title') Resultados de búsqueda @endsection
@section('leaflet')
  <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css')}}">
  <script src="{{ URL::asset('js/leaflet.js')}}"></script>
@endsection
@section('content')

<div class="container">

  <div class="como-funciona">

    <section class="search-result">
        <h1>Resultados de búsqueda</h1>
      <div id="mapid" class="searchresults-map">

      </div>
      <div class="mejores-espacios-container">


      @forelse ($espacios as $espacio)
        <article class="mejor-espacio-bloque" id="{{ $espacio->id }}">
          <a href="{{ route('show.espacio', $espacio->id) }}"><img class="mejor-espacio" src="/storage/espacios/{{ $espacio->fotos->first()->photoname}}" alt=""></a>
          <h3><strong>{{ 'Precio Final: $' . $espacio->precioFinal($horariollegada, $horariopartida)}}</strong> </h3>
           <h4 style="display:inline;">{{ $espacio->direccion }}</h4>
          <h4>{{ $espacio->tipoEspacio }}</h4>
          <img class="stars" src="/images/stars.png">
        </article>
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
  // Obtengo dirección ingresada por usuario que uso para geocoding
  var direccion = {!! json_encode($direccion) !!};
  // Obtengo espacios para usar con js
  var espacios = {!! json_encode($espacios) !!};

  </script>
  <script src="{{ URL::asset('js/search-results.js')}}"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkuJOGY0hwpTRHHsCoxPLc_1Bcv_sUIHk&v=3&callback=initMap">
  </script>
@endsection
