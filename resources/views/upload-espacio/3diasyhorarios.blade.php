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

            <select class="" name="" style="margin-bottom: 15px;">
              <option value="100">Todos los días</option>
            </select>

            <hr style="margin: 10px 0px;">

            <div class="upload-div-diasemana">
              <input type="text" name="diasemana[]" class="upload-input-dia" value="Lunes" readonly>
              <input type="text" name="horacomienzo[]" class="upload-input-hora" value="09:00" readonly>
              <span style="text-align:center;"> - </span>
              <input type="text" name="horafin[]" class="upload-input-hora" value="18:00" readonly>
              <label for="" class="upload-label-horario-button">&#8854;</label>
            </div>

            <hr style="margin: 10px 0px;">

            <div class="upload-div-diasemana">
              <input type="text" name="diasemana[]" class="upload-input-dia" value="Martes" readonly>
              <input type="text" name="horacomienzo[]" class="upload-input-hora" value="09:00" readonly>
              <span style="text-align:center;"> - </span>
              <input type="text" name="horafin[]" class="upload-input-hora" value="18:00" readonly>
              <label for="" class="upload-label-horario-button">&#8854;</label>
            </div>

            <hr style="margin: 10px 0px;">



            <div class="upload-div-cargahorario">

              <div class="upload-div-agregardia">
                <h3 class="upload-h3-agregardia">Agregar Horario</h3>
                <label for="" class="upload-label-horario-button" style="float: none; font-size:24px;">&#8853;</label>
                <label for="" class="upload-label-horario-button" style="float: none; font-size:24px; display:none;">&#10005;</label>
              </div>

              <div class="">
                <label for="[object Object]">Día</label>
                <select name="dia" class="upload-select-dia" style="" required>
                  <option value="" selected>Día</option>
                  <option value="Lunes">Lunes</option>
                  <option value="Martes">Martes</option>
                  <option value="Miércoles">Miércoles</option>
                  <option value="Jueves">Jueves</option>
                  <option value="Viernes">Viernes</option>
                  <option value="Sábado">Sábado</option>
                  <option value="Domingo">Domingo</option>
                </select>
              </div>

              <div class="">
                <label for="[object Object]">Desde</label>
                <select name="dia" class="upload-select-dia" style="" required>
                  <option value="0" selected>00:00</option>
                </select>
              </div>

              <div class="">
                <label for="[object Object]">Hasta</label>
                <select name="dia" class="upload-select-dia" style="" required>
                  <option value="0">00:00</option>
                  <option value="1439">23:59</option>
                </select>
              </div>

              <div class="">
                <label for="[object Object]">Todo el día</label>
              </div>

              <input type="submit" name="" value="Agregar Horario">

            </div>

            <form action="{{ route('insert.upload.espacio.4', $espacio) }}" method="post" class="form-uploadEspacio">
              {{ method_field('PUT') }}
              {{ csrf_field() }}

            @foreach ($diasSemana as $dia)

              <div class="upload-div-diasemana">

                <label for="" class="upload-label-diasemana">{{ $dia }}</label>

                <div class="upload-div-div-diasemana">

                  <input type="number" placeholder="00" name="horaComienzo{{ $dia }}" class="upload-input-horadia" min="0" max="23" value="{{ $espacio->diasyhorarios()->where('dia',$dia)->first() ? substr($espacio->comienzo($dia),0,2) : '00' }}">
                  <input type="number" placeholder="00" name="minutoComienzo{{ $dia }}" class="upload-input-horadia" min="0" max="59" value="{{ $espacio->diasyhorarios()->where('dia',$dia)->first() ? substr($espacio->comienzo($dia),3,2) : '00' }}">

                  <span class="upload-span-separadorhoras">-</span>

                  <input type="number" placeholder="00" name="horaFin{{ $dia }}" class="upload-input-horadia" min="0" max="23" value="{{ $espacio->diasyhorarios()->where('dia',$dia)->first() ? substr($espacio->fin($dia),0,2) : '00' }}">
                  <input type="number" placeholder="00" name="minutoFin{{ $dia }}" class="upload-input-horadia" min="0" max="59" value="{{ $espacio->diasyhorarios()->where('dia',$dia)->first() ? substr($espacio->fin($dia),3,2) : '00' }}">

                </div>

              </div>

            @endforeach

            <input type="submit" name="boton-volver" value="&#8249; Volver" class="upload-button-volver" formaction="{{ route('upload.espacio.2', $espacio) }}" formmethod="get">
            <input type="submit" name="boton-submit" value="SIGUIENTE" class="upload-button-submit">

          </form>

        </div>

        <div class="upload-div-sideimage3"></div>

      </section>
      <div class="clear"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

@endsection
