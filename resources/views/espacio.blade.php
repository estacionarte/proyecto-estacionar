@extends('layouts.app')
@section('title') {{$espacio->direccion}} @endsection
@section('leaflet')
  <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css')}}">
  <script src="{{ URL::asset('js/leaflet.js')}}"></script>
@endsection
@section('content')

  <div class="espacio-container">

      <img src="/storage/espacios/{{ $espacio->fotoPortada() }}" style="width: 100%; height: 420px; object-fit:cover;">

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

      <div class="form-generico" id="espacio-form">

        <h3 style="margin-left:2px">{{ $espacio->tipoEspacio }}</h3>
        <h4 style="margin-top:0px; font-size:1.1em;">Estadía con Auto ${{ $espacio->precioAutosMinuto }} por minuto</h4>

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


      <form method="POST" action="" style="display:inline;" onsubmit="confirm('ESTÁS POR RESERVAR ESTE ESPACIO')">
        {{ csrf_field() }}
        <button id="reservar-cochera" type="submit" class="btn btn-success">RESERVAR ESTE ESPACIO</button>
      </form>

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
  // Obtengo latlng que después paso al segundo script
  var lat = {!! json_encode($espacio->lat) !!};
  var lng = {!! json_encode($espacio->lng) !!};
  </script>

  <script src="{{ URL::asset('js/espacio.js')}}"></script>

  <script>
  window.onscroll = function(){formSticky()};

  var header = document.getElementById("espacio-form");
  // var sticky = header.offsetTop;

  function formSticky() {
    if (window.pageYOffset >= 550) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }

</script>

@endsection
