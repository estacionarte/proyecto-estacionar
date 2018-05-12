@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('content')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEspacio-progressBar">
        <div class="uploadEspacio-progressBar-progress3"></div>
      </div>

      <h1>Cargar Espacio - Días y Horarios (Paso 3 de 4)</h1>

      <section class="uploadEspacio">

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

        <div class="form-generico">

          <label for="" class="upload-label-titulo">¿En qué días y horarios va a estar disponible tu espacio?</label>

          {{-- <select class="" name="" style="margin-bottom: 15px;" id="predeterminados">
            <option value="personalizar">Personalizar</option>
            <option value="todos">Todos los días</option>
            <option value="findes">Fines de semana</option>
            <option value="laboral">Horario laboral</option>
          </select> --}}

            <div class="upload-div-cargahorario">

              {{-- <div class="upload-div-agregardia">
                <h3 class="upload-h3-agregardia">Agregar Horario</h3>
                <label for="" class="upload-label-horario-button" style="float: none; line-height: 20px;">&#8853;</label>
                <label for="" class="upload-label-horario-button" style="float: none; line-height: 20px; display:none;">&#10005;</label>
              </div> --}}

              <div class="upload-div-div-horario">
                <div class="upload-div-div-div-horario" style="margin-top:0px;">
                  <label for="">Día</label>
                  <select name="dia" class="upload-select-dia" style="" id="dia-select" required>
                    <option value="" selected>Día</option>
                    <option value="Lunes" {{ $horarios->get('Lunes') ? 'disabled' : ''}}>Lunes</option>
                    <option value="Martes" {{ $horarios->get('Martes') ? 'disabled' : ''}}>Martes</option>
                    <option value="Miércoles" {{ $horarios->get('Miércoles') ? 'disabled' : ''}}>Miércoles</option>
                    <option value="Jueves" {{ $horarios->get('Jueves') ? 'disabled' : ''}}>Jueves</option>
                    <option value="Viernes" {{ $horarios->get('Viernes') ? 'disabled' : ''}}>Viernes</option>
                    <option value="Sábado" {{ $horarios->get('Sábado') ? 'disabled' : ''}}>Sábado</option>
                    <option value="Domingo" {{ $horarios->get('Domingo') ? 'disabled' : ''}}>Domingo</option>
                  </select>
                </div>

                <div class="upload-div-div-div-horario">

                  <div class="upload-div-div-div-horario-hora">
                    <label for="">Desde</label>
                    <select name="horaComienzo" class="upload-select-dia" style="" id="horacomienzo-select" required>
                      <option value="0" selected>00:00</option>
                      <option value="30">00:30</option>
                      <option value="60">01:00</option>
                      <option value="90">01:30</option>
                      <option value="120">02:00</option>
                      <option value="150">02:30</option>
                      <option value="180">03:00</option>
                      <option value="210">03:30</option>
                      <option value="240">04:00</option>
                      <option value="270">04:30</option>
                      <option value="300">05:00</option>
                      <option value="330">05:30</option>
                      <option value="360">06:00</option>
                      <option value="390">06:30</option>
                      <option value="420">07:00</option>
                      <option value="450">07:30</option>
                      <option value="480">08:00</option>
                      <option value="510">08:30</option>
                      <option value="540">09:00</option>
                      <option value="570">09:30</option>
                      <option value="600">10:00</option>
                      <option value="630">10:30</option>
                      <option value="660">11:00</option>
                      <option value="690">11:30</option>
                      <option value="720">12:00</option>
                      <option value="750">12:30</option>
                      <option value="780">13:00</option>
                      <option value="810">13:30</option>
                      <option value="840">14:00</option>
                      <option value="870">14:30</option>
                      <option value="900">15:00</option>
                      <option value="930">15:30</option>
                      <option value="960">16:00</option>
                      <option value="990">16:30</option>
                      <option value="1020">17:00</option>
                      <option value="1050">17:30</option>
                      <option value="1080">18:00</option>
                      <option value="1110">18:30</option>
                      <option value="1140">19:00</option>
                      <option value="1170">19:30</option>
                      <option value="1200">20:00</option>
                      <option value="1230">20:30</option>
                      <option value="1260">21:00</option>
                      <option value="1290">21:30</option>
                      <option value="1320">22:00</option>
                      <option value="1350">22:30</option>
                      <option value="1380">23:00</option>
                      <option value="1410">23:30</option>
                    </select>
                  </div>

                  <div class="upload-div-div-div-horario-hora">
                    <label for="">Hasta</label>
                    <select name="horaFin" class="upload-select-dia" style="" id="horafin-select" required>
                      <option value="30">00:30</option>
                      <option value="60">01:00</option>
                      <option value="90">01:30</option>
                      <option value="120">02:00</option>
                      <option value="150">02:30</option>
                      <option value="180">03:00</option>
                      <option value="210">03:30</option>
                      <option value="240">04:00</option>
                      <option value="270">04:30</option>
                      <option value="300">05:00</option>
                      <option value="330">05:30</option>
                      <option value="360">06:00</option>
                      <option value="390">06:30</option>
                      <option value="420">07:00</option>
                      <option value="450">07:30</option>
                      <option value="480">08:00</option>
                      <option value="510">08:30</option>
                      <option value="540">09:00</option>
                      <option value="570">09:30</option>
                      <option value="600">10:00</option>
                      <option value="630">10:30</option>
                      <option value="660">11:00</option>
                      <option value="690">11:30</option>
                      <option value="720">12:00</option>
                      <option value="750">12:30</option>
                      <option value="780">13:00</option>
                      <option value="810">13:30</option>
                      <option value="840">14:00</option>
                      <option value="870">14:30</option>
                      <option value="900">15:00</option>
                      <option value="930">15:30</option>
                      <option value="960">16:00</option>
                      <option value="990">16:30</option>
                      <option value="1020">17:00</option>
                      <option value="1050">17:30</option>
                      <option value="1080">18:00</option>
                      <option value="1110">18:30</option>
                      <option value="1140">19:00</option>
                      <option value="1170">19:30</option>
                      <option value="1200">20:00</option>
                      <option value="1230">20:30</option>
                      <option value="1260">21:00</option>
                      <option value="1290">21:30</option>
                      <option value="1320">22:00</option>
                      <option value="1350">22:30</option>
                      <option value="1380">23:00</option>
                      <option value="1410">23:30</option>
                      <option value="1439" selected>23:59</option>
                    </select>
                  </div>

                </div>

                <div class="upload-div-div-horario-diaentero">
                  {{-- <label for="dia-entero" class="upload-label-checkbox" style="text-align: inherit; margin:inherit; padding: inherit;">Todo el día
                    <input type="checkbox" name="dia-entero" id="dia-entero" value="1" class="upload-input-checkbox">
                    <span class="upload-span-checkbox"></span>
                  </label> --}}
                  <input type="checkbox" name="dia-entero" id="dia-entero" value="1" style="margin-top:0px;" checked="true">
                  <label for="dia-entero" style="margin-bottom:0px;">Todo el día</label>
                </div>

              </div>

              <button type="button" name="" id="boton-agregar-horario">Agregar Horario</button>

            </div>

            <form action="{{ route('insert.upload.espacio.4', $espacio) }}" method="post" class="form-uploadEspacio" id="form-horarios">
              {{ method_field('PUT') }}
              {{ csrf_field() }}

              {{-- Acá van los horarios que agrega el usuario --}}
              <div class="horarios-holder">

                <hr style="margin: 10px 0px;">

                {{-- @foreach ($iterable as $key => $value)

                @endforeach --}}

                @foreach ($horarios as $horario)
                  <div class="upload-div-diasemana">

                    <input type='text' name='diasemana[{{$horario->dia}}]' class='upload-input-dia' value='{{$horario->dia}}' readonly>

                    <input type='text' class='upload-input-hora' value='{{$espacio->minutosEnHoraDelDia($horario->horaComienzo)}}' disabled>
                    <span style='text-align:center;'> - </span>
                    <input type='text' name='' class='upload-input-hora' value='{{$espacio->minutosEnHoraDelDia($horario->horaFin)}}' disabled>

                    <label onclick='borrarHorario(event)' class='upload-label-horario-button'>&#8854;</label>

                    <hr style='margin: 10px 0px;'>

                    <input type='text' name='horacomienzo[{{$horario->dia}}]' class='upload-input-hora' value='{{$horario->horaComienzo}}' style='display:none;'>

                    <input type='text' name='horafin[{{$horario->dia}}]' class='upload-input-hora' value='{{$horario->horaFin}}' style='display:none;'>

                  </div>
                @endforeach

              </div>

              <p style="margin: 15px 0px 0px; font-size: 0.9em;">Si el conductor no retira su vehículo dentro del tiempo acordado, se le seguirá cobrando</p>

              <input type="submit" name="boton-volver" value="&#8249; Volver" class="upload-button-volver" formaction="{{ route('upload.espacio.2', $espacio) }}" formmethod="get">
              <input type="submit" name="boton-submit" value="SIGUIENTE" class="upload-button-submit">


            </form>

        </div>

        <div class="upload-div-sideimage3"></div>

      </section>
      <div class="clear"></div>
    </div>
  </div>

@endsection

@section('scripts')
  <script src="{{ URL::asset('js/upload-espacio/3diasyhorarios.js')}}"></script>
@endsection
