@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('content')

  <div class="bodies-main-content upload-espacio">
    <div class="gral-main">
      <h1>Cargar Espacio - Estadías <small>Paso 2 de 4</small></h1>
      <section class="signin upload">

      <div class="progress uploadEspacio-progressBar">
          <div class="determinate" style="width: 40%"></div>
      </div>

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif


          <form action="{{ route('insert.upload.espacio.3', $espacio) }}" method="post" class="form-uploadEspacio">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="row">
              <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                <h3>¿Cuánto tiempo pueden permanecer los vehículos?</h3>
              </div>
              <div class="input-field col s4 offset-s1">
                <input type="number" name="tiempoMinimo" min="1" max="10000" value="{{ old('tiempoMinimo', $espacio->estadiaMinimaMinutos) }}">
                <label for="tiempoMinimo">Mínimo. Ej:  10 min</label>
              </div>
              <div class="input-field col s4 offset-s1">
                <select name="medidaDeTiempoMin">
                  <option value="Minutos" {{ old('medidaDeTiempoMin') == 'Minutos' ? 'selected':'' }}>minutos</option>
                  <option value="Horas" {{ old('medidaDeTiempoMin') == 'Horas' ? 'selected':'' }}>Horas</option>
                  <option value="Dias" {{ old('medidaDeTiempoMin') == 'Dias' ? 'selected':'' }}>Dias</option>
                </select>
              </div>
              <div class="input-field col s4 offset-s1">
                <input type="number" name="tiempoMaximo" min="1" max="10000" value="{{ old('tiempoMaximo', $espacio->estadiaMaximaMinutos) }}">
                <label for="zipcode">Máximo. Ej:  4 horas</label>
              </div>
              <div class="input-field col s4 offset-s1">
                <select name="medidaDeTiempoMax">
                  <option value="Minutos" {{ old('medidaDeTiempoMax') == 'Minutos' ? 'selected':'' }}>minutos</option>
                  <option selected value="Horas" {{ old('medidaDeTiempoMax') == 'Horas' ? 'selected':'' }}>Horas</option>
                  <option value="Dias" {{ old('medidaDeTiempoMax') == 'Dias' ? 'selected':'' }}>Dias</option>
                </select>
              </div>
              <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                <h3>¿Cuánta anticipación se necesita para la reserva?</h3>
              </div>
              <div class="input-field col s4 offset-s1">
                <input type="number" name="tiempoAnticipacion" min="0" max="10000" value="{{ old('tiempoAnticipacion', $espacio->tiempoAnticipacion) }}">
                <label for="tiempoAnticipacion">ej:  15 min</label>
              </div>
              <div class="input-field col s4 offset-s1">
                <select name="medidaDeTiempoAnt">
                  <option value="Minutos" {{ old('medidaDeTiempoAnt') == 'Minutos' ? 'selected':'' }}>minutos</option>
                  <option value="Horas" {{ old('medidaDeTiempoAnt') == 'Horas' ? 'selected':'' }}>Horas</option>
                  <option value="Dias" {{ old('medidaDeTiempoAnt') == 'Dias' ? 'selected':'' }}>Dias</option>
                </select>
              </div>
              <div class="col s5 left-align boton">
                  <button class="btn waves-effect waves-light  teal lighten-3" type="submit" name="boton-volver" formaction="{{ route('editar.upload.espacio.1', $espacio) }}">Volver
                      <i class="material-icons left">arrow_back</i>
                  </button>
              </div>
              <div class="col s5 offset-s1 right-align boton">
                  <button class="btn waves-effect waves-light  red darken-2" type="submit" name="boton-submit">SIGUIENTE
                      <i class="material-icons right">send</i>
                  </button>
              </div>
            </div>
          </form>
      </section>
        </div>

        <div class="upload-div-sideimage2"></div>


      <div class="clear"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>
  <script>
      // SELECT DE FORMULARIO
        $(document).ready(function() {
          $('select').material_select();
        });
  </script>

@endsection
