@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEspacio-progressBar">
        <div class="uploadEspacio-progressBar-progress5"></div>
      </div>

      <h1>Confirmar Datos</h1>

      <section class="uploadEspacio">

        <section class="upload-seccion-resumen">

          <div class="div-section">
            <div>
              <h2>Información General</h2>
              <a href="{{ route('editar.upload.espacio.1', $espacio) }}" class="upload-a-editar">Editar</a>
            </div>
            <p>{{ $espacio->direccion }} {{ $espacio->dpto }}</p>
            <p>{{ $espacio->ciudad }}, {{ $espacio->provincia }}, {{ $espacio->pais }}, {{ $espacio->zipcode }}</p>
            <ul>
              <li>{{ $espacio->tipoEspacio }}</li>
              <li>Autos: {{ $espacio->cantAutos }}</li>
              <li>Motos: {{ $espacio->cantMotos }}</li>
              <li>Bicicletas: {{ $espacio->cantBicicletas }}</li>
              <li>{{ $espacio->aptoDiscapacitados ? 'Apto para discapacitados' : 'NO apto para discapacitados' }}</li>
              <li>{{ $espacio->aptoElectricos ? 'Carga autos eléctricos' : 'NO carga autos eléctricos' }}</li>
            </ul>
            <p>Fotos del espacio:</p>
            @foreach ($fotos as $foto)
              <div class="upload-div-foto">
                <img src="/storage/espacios/{{ $foto->photoname }}" alt="" class="upload-img-foto">
              </div>
            @endforeach
          </div>

          <br> <hr> <br>

          <div class="div-section">
            <div>
              <h2>Estadías</h2>
              <a href="{{ route('upload.espacio.2', $espacio) }}" class="upload-a-editar">Editar</a>
            </div>
            <ul>
              <li>Tiempo mínimo: {{ $tiempominimo }}</li>
              <li>Tiempo máximo: {{ $tiempomaximo }}</li>
              <li>Anticipación para reservar: {{ $anticipacion }}</li>
            </ul>
          </div>

          <br> <hr> <br>

          <div class="div-section">
            <div>
              <h2>Días y Horarios</h2>
              <a href="{{ route('upload.espacio.3', $espacio) }}" class="upload-a-editar">Editar</a>
            </div>
            <ul>
              @foreach ($horarios as $horario)
                <li>{{ $horario }}</li>
              @endforeach
            </ul>
          </div>

          <br> <hr> <br>

          <div class="div-section">
            <div>
              <h2>Precios</h2>
              <a href="{{ route('upload.espacio.4', $espacio) }}" class="upload-a-editar">Editar</a>
            </div>
            <p>Precio por minuto: ${{ $espacio->precioAutosMinuto }}</p>
            <ul>
              @foreach ($descuentos as $descuento)
                <li>Descuento a partir de {{ $descuento->hora }} horas: {{ $descuento->descuento * 100 }}%</li>
              @endforeach
            </ul>
          </div>
        </section>

        <a href="{{route('profile')}}" id="confirmar-espacio">CONFIRMAR ESPACIO</a>

        <div class="upload-div-sideimage4"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
