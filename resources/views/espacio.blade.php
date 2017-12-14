@extends('layouts.app')
@section('title') {{$espacio->direccion}} @endsection
@section('content')

  <div class="espacio-container">

      <img src="/storage/espacios/{{ $espacio->fotoPortada() }}" style="width: 100%; height: 420px; object-fit:cover;">

    <div class="espacio-main-content">

      {{-- <h1>Estadías</h1> --}}

      <section class="show-espacio" style="padding-left:15px; padding-bottom:40px;">

        {{-- {{ dd($espacio->fotoPortada()) }} --}}

        <h2>{{ $espacio->direccion }}</h2>
        <h3 style="margin-top:0px; font-size:1.1em;">{{ $espacio->tipoEspacio }}</h3>

        <hr class="estadia-linea">

        <ul>
          <li style="list-style-type: circle; list-style-position: inside;">{{ $espacio->aptoDiscapacitados }}</li>
          <li>{{ $espacio->aptoElectricos }}</li>
        </ul>

        <hr class="estadia-linea">

        <p>{{ $espacio->infopublica }}</p>

        <hr class="estadia-linea">

        <p><span style="text-decoration:underline;">Tiempo mínimo de alquiler:</span> {{ $tiempominimo }}</p>
        <p><span style="text-decoration:underline;">Tiempo máximo de alquiler:</span> {{ $tiempomaximo }}</p>
        <p><span style="text-decoration:underline;">Anticipación necesaria para reservar espacio:</span> {{ $anticipacion }}</p>

        <hr class="estadia-linea">

        <div class="form-estadia" style="padding: 10px;">
          <form class="search-espacios-form" action="{{ route('show.search')}}" method="get">
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
                <option value="">00</option>
                <option value="">01</option>
                <option value="">02</option>
              </select>
              <select name="search-espacios-minuto-comienzo" class="search-espacios-minuto">
                <option value="">00</option>
                <option value="">05</option>
                <option value="">10</option>
              </select>
            </div>
            <div class="search-horario">
              <h5>Partida</h5>
              <input type="date" name="" value="">
              <select name="search-espacios-hora-fin" class="search-espacios-hora">
                <option value="">00</option>
                <option value="">01</option>
                <option value="">02</option>
              </select>
              <select name="search-espacios-hora-fin" class="search-espacios-minuto">
                <option value="">00</option>
                <option value="">05</option>
                <option value="">10</option>
              </select>
            </div>
            <button type="submit" name="search-espacios-submit"><i class="fa fa-search"></i></button>
            <input type="submit" name="BUSCAR" value="BUSCAR">
          </form>
        </div>

        <br>

        <div>

        </div>

      </section>

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
