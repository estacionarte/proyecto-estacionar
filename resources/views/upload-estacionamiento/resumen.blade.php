@extends('layouts.app')
@section('title') Cargar Estacionamiento @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEstacionamiento-progressBar">
        <div class="uploadEstacionamiento-progressBar-progress5"></div>
      </div>

      <h1>Confirmar Datos</h1>

      <section class="uploadEstacionamiento">

        <section class="upload-seccion-resumen">
          <h2>Información General</h2>
          <p>{{ $espacio->direccion }} {{ $espacio->dpto }}</p>
          <p>{{ $espacio->ciudad }}, {{ $espacio->provincia }}, {{ $espacio->pais }}, {{ $espacio->zipcode }}</p>
          <br>
          <p>{{ $espacio->tipoEspacio }}</p>
          <br>
          <p>Autos: {{ $espacio->cantAutos }}</p>
          <p>Motos: {{ $espacio->cantMotos }}</p>
          <p>Bicicletas: {{ $espacio->cantBicicletas }}</p>
          <br>
          <p>{{ $espacio->aptoDiscapacitados ? 'Apto para discapacitados' : 'NO apto para discapacitados' }}</p>
          <p>{{ $espacio->aptoElectricos ? 'Carga autos eléctricos' : 'NO carga autos eléctricos' }}</p>
          <br>
          <p>{{ $espacio->infopublica }}</p>
          <p>{{ $espacio->infoprivada }}</p>
          <br>
          <p>FOTOS</p>

          <br><br>

          <h2>Estadías</h2>
          <p>Tiempo mínimo: {{ $espacio->estadiaMinimaMinutos }} minutos</p>
          <p>Tiempo máximo: {{ $espacio->estadiaMaximaMinutos }} minutos</p>
          <p>Anticipación para reservar: {{ $espacio->anticipacionMinutos }} minutos</p>

          <br><br>

          <h2>Días y Horarios</h2>
          <p>Lunes: {{ $espacio->estadiaMinimaMinutos }} minutos</p>
          <p>Tiempo máximo: {{ $espacio->estadiaMaximaMinutos }} minutos</p>
          <p>Anticipación para reservar: {{ $espacio->anticipacionMinutos }} minutos</p>

          <br><br>

        </section>

        <div class="upload-div-sideimage4"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
