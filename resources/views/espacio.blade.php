@extends('layouts.app')
@section('title') {{$espacio->direccion}} @endsection
@section('leaflet')
  <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css')}}">
  <script src="{{ URL::asset('js/leaflet.js')}}"></script>
@endsection
@section('content')

  <div class="espacio-container">

    @if ($espacio->hayfoto())
      <img class="espacio-img-top" src="/storage/espacios/{{ $espacio->fotoPortada() }}" id="img-top-espacio">
    @else
      <img class="espacio-img-top" src="/storage/espacios/noespacio.jpg" id="img-top-espacio">
    @endif


    <div class="espacio-main-content">

      <section class="show-espacio">

        <div class="direccion">
          <p>{{ $espacio->tipoEspacio }}</p>
          <h2>{{ $espacio->direccion }}</h2>
          <h4> {{ $espacio->pais }} , {{ $espacio->provincia }} </h4>
        </div>

        <hr class="estadia-linea">

        <div class="capacidad">
          <h4>Este espacio tiene capacidad para alojar:</h4>
          <div class="vehiculos">
            <i class="fas fa-car"></i><p>{{ $espacio->cantAutos }} autos</p>
          </div>
          <div class="vehiculos">
            <i class="fas fa-motorcycle"></i><p> {{ $espacio->cantMotos }}  motos</p>
          </div>
          <div class="vehiculos">
            <i class="fas fa-bicycle"></i><p> {{ $espacio->cantBicicletas }}  bicicletas</p>
          </div>
        </div>

        <hr class="estadia-linea">

        <div class="descripcion-visible">
          <p>{{ $espacio->infopublica }}</p>
        </div>

        <hr class="estadia-linea">

        <div class="capacidad">
          <h4>Este espacio cuenta con los siguientes servicios especiales</h4>
          @if ($espacio->aptoDiscapacitados)
            <div class="vehiculos">
              <i class="fas fa-wheelchair"></i><p>{{ $espacio->aptoDiscapacitados }}</p>
            </div>
          @endif
          @if ($espacio->aptoElectricos)
            <div class="vehiculos">
              <i class="fas fa-plug"></i><p>{{ $espacio->aptoElectricos }}</p>
            </div>
          @endif
        </div>

        <hr class="estadia-linea">

        <div class="capacidad">
          <h4>Tiempos de Estadia</h4>
          <div class="vehiculos">
            <i class="fas fa-clock"></i><p><span>Mínima:</span> {{ $tiempominimo }}</p>
          </div>
          <div class="vehiculos yyy">
            <i class="fas fa-clock"></i><p><span>Máxima:</span> {{ $tiempomaximo }}</p>
          </div>
          <div class="vehiculos">
            <i class="fas fa-clock"></i><p><span>Anticipación de reserva:</span> {{ $anticipacion }}</p>
          </div>
        </div>


        <hr class="estadia-linea">

        <div class="capacidad">
          <h4>Valores de Estadía</h4>
          <div class="vehiculos y">
            <i class="fas fa-car"></i><p>Estadía con Auto $ {{ $espacio->precioAutosMinuto }}  por minuto</p>
          </div>
          <div class="vehiculos yy">
            <i class="fas fa-motorcycle"></i><p>Estadía con Moto $ {{ $espacio->precioMotosMinuto }}  por minuto</p>
          </div>
          <div class="vehiculos">
            <i class="fas fa-bicycle"></i><p>Estadía con Bici $ {{ $espacio->precioBicicletasMinuto }}  por minuto</p>
          </div>
        </div>

        <hr class="estadia-linea">

        <div class="btn-container">
          <a id="btn{{ $espacio->id }}" class="mejor-espacio-boton-alquilar btn btn-danger">Alquilar este espacio</a>
        </div>
      </section>

      <hr class="estadia-linea">

      <article id="{{ $espacio->id }}" class="modal-reserva-espacio">
        @include('_modal-alquilar')
      </article>

      <div class="clear"></div>

      <div class="">
        <h2 style="margin-left:15px">El barrio</h2>

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

//   window.onscroll = function() {posicionarModal()};
//
//   // function posicionarModal() {
//   //     document.getElementById("yo").style.position = "fixed";
//   //   }
//
//   var modalAlquilar = document.getElementById("yo");
//
// function posicionarModal() {
//   if (window.pageYOffset >= 360) {
//     modalAlquilar.classList.add("sticky");
//     // modalAlquilar.style.width = '45%';
//     modalAlquilar.style.top = '0';
//     // modalAlquilar.style.left = '50%';
//   } else {
//     modalAlquilar.classList.remove("sticky");
//   }
// }

</script>

@endsection
