@extends('layouts.app')
@section('title') {{$espacio->direccion}} @endsection
@section('leaflet')
  <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css')}}">
  <script src="{{ URL::asset('js/leaflet.js')}}"></script>
@endsection
@section('content')

  <div class="espacio-container">

      <img src="/storage/espacios/{{ $espacio->fotoPortada() }}" style="width: 100%; height: 420px; object-fit:cover;" id="img-top-espacio">

    <div class="espacio-main-content">

      <section class="show-espacio" style="padding-left:15px; padding-bottom:40px;">

        <h2>{{ $espacio->direccion }}</h2>
        <h4> {{ $espacio->pais }} , {{ $espacio->provincia }} </h4>

        <hr class="estadia-linea">

        <h3 style="margin-top:0px; font-size:1.1em;">{{ $espacio->tipoEspacio }}</h3>
        <h3 style="margin-top:0px; font-size:1.1em;">Estadía con Auto $ {{ $espacio->precioAutosMinuto }}  por minuto</h3>
        <h3 style="margin-top:0px; font-size:1.1em;">Estadía con Moto $ {{ $espacio->precioMotosMinuto }}  por minuto</h3>
        <h3 style="margin-top:0px; font-size:1.1em;">Estadía con Bici $ {{ $espacio->precioBicicletasMinuto }}  por minuto</h3>

        <hr class="estadia-linea">

        <ul>
          @if ($espacio->aptoDiscapacitados)
            <li style="list-style-type: circle; list-style-position: inside;">{{ $espacio->aptoDiscapacitados }}</li>
          @endif
          @if ($espacio->aptoElectricos)
            <li style="list-style-type: circle; list-style-position: inside;">{{ $espacio->aptoElectricos }}</li>
          @endif
        </ul>

        <hr class="estadia-linea">

        <h3 style="margin-top:0px; font-size:1.1em;">Este espacio tiene capacidad para alojar: <br> <br>{{ $espacio->cantAutos }} autos</h3>
        <h3 style="margin-top:0px; font-size:1.1em;"> {{ $espacio->cantMotos }}  motos</h3>
        <h3 style="margin-top:0px; font-size:1.1em;"> {{ $espacio->cantBicicletas }}  bicicletas</h3>

        <p>{{ $espacio->infopublica }}</p>

        <hr class="estadia-linea">

        <p><span style="text-decoration:underline;">Tiempo mínimo de alquiler:</span> {{ $tiempominimo }}</p>
        <p><span style="text-decoration:underline;">Tiempo máximo de alquiler:</span> {{ $tiempomaximo }}</p>
        <p><span style="text-decoration:underline;">Anticipación necesaria para reservar espacio:</span> {{ $anticipacion }}</p>

        <hr class="estadia-linea">

      </section>

      <a id="btn{{ $espacio->id }}" class="mejor-espacio-boton-alquilar">Mostrar formulario alquiler</a>
      <article id="{{ $espacio->id }}" class="modal-reserva-espacio">
        @include('_modal-alquilar')
      </article>

      <div class="clear"></div>

      <div class="">
        <h2 style="margin-left:15px">Ubicación</h2>

        <div id="mapid" class="espacio-map"></div>

      </div>
    </div>
  </div>
@endsection

@section('scripts')

  <script>
  // Obtengo latlng que después paso al script 'espacio.js'
  var lat = {!! json_encode($espacio->lat) !!};
  var lng = {!! json_encode($espacio->lng) !!};

  // Obtengo espacios para usar con js en script 'modal-alquilar.js'
  var espacios = {!! json_encode($espacio) !!};
  espacios.length = 1;
  </script>

  <script src="{{ URL::asset('js/espacio.js')}}"></script>

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

  window.onscroll = function() {posicionarModal()};

  // function posicionarModal() {
  //     document.getElementById("yo").style.position = "fixed";
  //   }

  var modalAlquilar = document.getElementById("yo");

function posicionarModal() {
  if (window.pageYOffset >= 360) {
    modalAlquilar.classList.add("sticky");
    // modalAlquilar.style.width = '45%';
    modalAlquilar.style.top = '0';
    // modalAlquilar.style.left = '50%';
  } else {
    modalAlquilar.classList.remove("sticky");
  }
}

</script>

@endsection
