@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('content')

  <div class="container">

    <div class="bodies-main-content">

      <h1>Cargar Espacio - Estadías</h1>

      <section class="showEspacio">

        {{-- {{ dd($espacio->fotoPortada()) }} --}}

        @if (\Auth::user()->espacios()->where('id',$espacio->id)->first()->fotos->count() != 0)
          <img src="/storage/espacios/{{ $espacio->fotoPortada() }}" style="width: 100%; height: 150px; object-fit:cover;">
        @endif

        <h2>{{ $espacio->direccion }}</h2>
        <h3 style="margin-top:0px; font-size:1.1em;">{{ $espacio->tipoEspacio }}</h3>

        <hr>

        <ul>
          <li style="list-style-type: circle; list-style-position: inside;">{{ $espacio->aptoDiscapacitados }}</li>
          <li>{{ $espacio->aptoElectricos }}</li>
        </ul>

        <hr>

        <p>{{ $espacio->infopublica }}</p>

        <hr>

        <p><span style="text-decoration:underline;">Tiempo mínimo de alquiler:</span> {{ $tiempominimo }}</p>
        <p><span style="text-decoration:underline;">Tiempo máximo de alquiler:</span> {{ $tiempomaximo }}</p>
        <p><span style="text-decoration:underline;">Anticipación necesaria para reservar espacio:</span> {{ $anticipacion }}</p>

        <hr>

        <div class="form-generico">
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

        <div class="" style="text-align:center">
          $100
        </div>

      </section>
      <div class="clear"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
