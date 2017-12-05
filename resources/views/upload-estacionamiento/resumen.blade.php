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
          <h2>Información General</h2><a href="{{ route('upload.estacionamiento.1', $espacio) }}">Editar</a>
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
          @foreach ($fotos as $foto)
            <img src="/storage/espacios/{{ $foto->photoname }}" alt="" class="upload-img-foto">
          @endforeach

          <br><br>

          <h2>Estadías</h2><a href="{{ route('upload.estacionamiento.2', $espacio) }}">Editar</a>
          <p>Tiempo mínimo: {{ $tiempominimo }}</p>
          <p>Tiempo máximo: {{ $tiempomaximo }}</p>
          <p>Anticipación para reservar: {{ $anticipacion }}</p>

          <br><br>

          <h2>Días y Horarios</h2><a href="{{ route('upload.estacionamiento.3', $espacio) }}">Editar</a>
          @foreach ($horarios as $horario)
            <p>{{ $horario }}</p>
          @endforeach

          <br><br>

          <h2>Precios</h2><a href="{{ route('upload.estacionamiento.4', $espacio) }}">Editar</a>
          <p>Precio por minuto: ${{ $espacio->precioAutosMinuto }}</p>
          @foreach ($descuentos as $descuento)
            <p>Descuento a partir de {{ $descuento->hora }} horas: {{ $descuento->descuento * 100 }}%</p>
          @endforeach
        </section>

        <div class="upload-div-sideimage4"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
