@extends('layouts.app')
@section('title') {{$espacio->direccion}} @endsection
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
        <h2 style="margin-left:15px">El Barrio</h2>

        <div id="map"></div>

      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>
  <script type="text/javascript">
    var mymap = L.map('map').setView([-34.64, -58.38], 14);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox.streets',
      accessToken: 'pk.eyJ1Ijoiam9hcGFub3MiLCJhIjoiY2pha2Z2eG1zMmlrNTMzcno2OHQ0b3VvYiJ9.jgj5HdcO2n9VZJpuSn4_wA'
    }).addTo(mymap);

    var marker = L.marker([-34.6211, -58.38151]).addTo(mymap);

    var popup = L.popup()
      .setLatLng([-34.6111, -58.38151])
      .setContent("Soy Digital House!")
      .openOn(mymap);

  </script>

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
