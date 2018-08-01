@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('content')

  <div class="bodies-main-content upload-espacio">
    <div class="gral-main">
      <h1>Confirmar Datos</h1>
      <section class="signin upload">
        <div class="progress uploadEspacio-progressBar">
            <div class="determinate" style="width: 100%"></div>
        </div>

        <div class="row">
          <section class="upload-seccion-resumen">

          <div class="col s10 offset-s1 div-section">

            <div>
              <h2>Información General</h2>
              <a href="{{ route('editar.upload.espacio.1', $espacio) }}" class="upload-a-editar">Editar</a>
            </div>

            <h3>{{ $espacio->nombre }}</h3>

            <p>{{ $espacio->direccion }}</p>

            <p>{{ $espacio->ciudad }}, {{ $espacio->provincia }}, {{ $espacio->pais }}, {{ $espacio->zipcode }}</p>

            <ul>
              <li>{{ $espacio->tipoEspacio }}</li>
              @if ($espacio->cantAutos > 0)
                <li>Vehículo a recibir: auto</li>
              @elseif ($espacio->cantMotos > 0)
                <li>Vehículo a recibir: moto</li>
              @else
                <li>Vehículo a recibir: bicileta</li>
              @endif
              {{-- <li>Autos: {{ $espacio->cantAutos }}</li>
              <li>Motos: {{ $espacio->cantMotos }}</li>
              <li>Bicicletas: {{ $espacio->cantBicicletas }}</li> --}}
              <li>{{ $espacio->aptoDiscapacitados ? 'Apto para discapacitados' : 'NO apto para discapacitados' }}</li>
              <li>{{ $espacio->aptoElectricos ? 'Carga autos eléctricos' : 'NO carga autos eléctricos' }}</li>
            </ul>

            <p>Descripción del espacio: {{ $espacio->infopublica }}</p>

            <p>Información para quienes reservan: {{ $espacio->infoprivada }}</p>

            <p>Fotos del espacio:</p>
            @forelse ($fotos as $foto)
              <div class="upload-div-foto">
                <img src="/storage/espacios/{{ $foto->photoname }}" alt="" class="upload-img-foto">
              </div>
            @empty
              <p>No cargaste ninguna foto. Recordá que necesitás por lo menos una para disponibilizar tu espacio.</p>
            @endforelse
            <br> <hr> <br>
          </div>


          <div class="col s10 offset-s1 div-section">
            <div>
              <h2>Estadías</h2>
              <a href="{{ route('upload.espacio.2', $espacio) }}" class="upload-a-editar">Editar</a>
            </div>

            <ul>
              <li>Tiempo mínimo: {{ $tiempominimo }}</li>
              <li>Tiempo máximo: {{ $tiempomaximo }}</li>
              <li>Anticipación para reservar: {{ $anticipacion }}</li>
            </ul>
            <br> <hr> <br>
          </div>


          <div class="col s10 offset-s1 div-section">
            <div>
              <h2>Días y Horarios</h2>
              <a href="{{ route('upload.espacio.3', $espacio) }}" class="upload-a-editar">Editar</a>
            </div>
            <p>Tu espacio estará disponible en los siguientes días y horarios:</p>
            <ul>
              @foreach ($horarios as $horario)
                <li>{{ $horario }}</li>
              @endforeach
            </ul>
            <br> <hr> <br>
          </div>


          <div class="col s10 offset-s1 div-section">
            <div>
              <h2>Precios</h2>
              <a href="{{ route('upload.espacio.4', $espacio) }}" class="upload-a-editar">Editar</a>
            </div>
            <p>Precio por hora: ${{ round($espacio->precioAutosMinuto * 60) }}</p>
            <ul>
              @foreach ($descuentos as $descuento)
                <li>Descuento a partir de {{ $descuento->hora }} horas: {{ $descuento->descuento * 100 }}%</li>
              @endforeach
            </ul>
          </div>
        </section>
        </div>

        <br> <hr> <br>

        <form action="{{ route('confirm.espacio', $espacio) }}" method="post" id="form-submit">
          {{ method_field('PUT') }}
          {{ csrf_field() }}

          <div class="div-section">
            <p class="col s12 center-align ">
              <input type="checkbox" name="necesita_confirmacion" id="necesita_confirmacion" checked="false">
              <label for="dia-entero">Requiere aprobación previa</label>
            </p>
            <p>Si tildás esta caja, tendrás que aprobar manualmente todas las solicitudes de alquiler que te hagan.</p>
          </div>

          <div class="col s5 offset-s1 right-align boton">
              <button class="btn waves-effect waves-light  red darken-2" type="submit" name="boton-submit">CONFIRMAR ESPACIO
                  <i class="material-icons right">send</i>
              </button>
          </div>

          <a href="{{ route('show.espacio', $espacio->id) }}" id="confirmar-espacio">CONFIRMAR ESPACIO</a>

        </form>

        <div class="upload-div-sideimage4"></div>

      </section>
    </div>
  </div>

@endsection
