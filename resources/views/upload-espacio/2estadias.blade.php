@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEspacio-progressBar">
        <div class="uploadEspacio-progressBar-progress2"></div>
      </div>

      <h1>Cargar Espacio - Estadías</h1>

      <section class="uploadEspacio">

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

        <div class="form-generico">

          <form action="{{ route('insert.upload.espacio.3', $espacio) }}" method="post" class="form-uploadEspacio">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <label for="" class="upload-label-titulo">¿Cuánto tiempo pueden permanecer los vehículos?</label>
            
            <label for="" class="upload-label-tiempoMinimoyMax">Mínimo</label>
            <select name="medidaDeTiempoMin" class="upload-select-tiempoMinimoyMax">
              <option value="Minutos" {{ old('medidaDeTiempoMin') == 'Minutos' ? 'selected':'' }}>minutos</option>
              <option value="Horas" {{ old('medidaDeTiempoMin') == 'Horas' ? 'selected':'' }}>horas</option>
              <option value="Dias" {{ old('medidaDeTiempoMin') == 'Dias' ? 'selected':'' }}>días</option>
            </select>
            <input type="number" placeholder="10" name="tiempoMinimo" class="upload-input-tiempoMinimoyMax" min="1" max="10000" value="{{ old('tiempoMinimo', $espacio->estadiaMinimaMinutos) }}">

            <label for="" class="upload-label-tiempoMinimoyMax">Máximo</label>
            <select name="medidaDeTiempoMax" class="upload-select-tiempoMinimoyMax">
              <option value="Minutos" {{ old('medidaDeTiempoMax') == 'Minutos' ? 'selected':'' }}>minutos</option>
              <option value="Horas" {{ old('medidaDeTiempoMax') == 'Horas' ? 'selected':'' }}>horas</option>
              <option value="Dias" {{ old('medidaDeTiempoMax') == 'Dias' ? 'selected':'' }}>días</option>
            </select>
            <input type="number" placeholder="210" name="tiempoMaximo" class="upload-input-tiempoMinimoyMax" min="0" max="10000" value="{{ old('tiempoMaximo', $espacio->estadiaMaximaMinutos) }}">

            <label for="" class="upload-label-titulo">¿Cuánta anticipación se necesita para la reserva?</label>

            <label for="" class="upload-label-tiempoMinimoyMax">Anticipación</label>
            <select name="medidaDeTiempoAnt" class="upload-select-tiempoMinimoyMax">
              <option value="Minutos" {{ old('medidaDeTiempoAnt') == 'Minutos' ? 'selected':'' }}>minutos</option>
              <option value="Horas" {{ old('medidaDeTiempoAnt') == 'Horas' ? 'selected':'' }}>horas</option>
              <option value="Dias" {{ old('medidaDeTiempoAnt') == 'Dias' ? 'selected':'' }}>días</option>
            </select>
            <input type="number" placeholder="15" name="tiempoAnticipacion" class="upload-input-tiempoMinimoyMax" min="0" max="10000" value="{{ old('tiempoAnticipacion', $espacio->anticipacionMinutos) }}">

            <input type="submit" name="boton-submit" value="&#8249; Volver" class="upload-button-volver">
            <input type="submit" name="boton-submit" value="SIGUIENTE" class="upload-button-submit">

          </form>

        </div>

        <div class="upload-div-sideimage2"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
