@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEspacio-progressBar">
        <div class="uploadEspacio-progressBar-progress3"></div>
      </div>

      <h1>Cargar Espacio - Días y Horarios</h1>

      <section class="uploadEspacio">

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

        <div class="form-generico">

          <form action="{{ route('insert.upload.espacio.4', $espacio) }}" method="post" class="form-uploadEspacio">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <label for="" class="upload-label-titulo">¿En qué días y horarios va a estar disponible tu espacio?</label>

            @foreach ($diasSemana as $dia)

              <label for="" class="upload-label-diasemana">{{ $dia }}</label>

              <input type="number" placeholder="00" name="minutoFin{{ $dia }}" class="upload-input-horadia" min="0" max="59" value="00"><input type="number" placeholder="00" name="horaFin{{ $dia }}" class="upload-input-horadia" min="0" max="23" value="00">

              <span class="upload-span-separadorhoras">-</span>

              <input type="number" placeholder="00" name="minutoComienzo{{ $dia }}" class="upload-input-horadia" min="0" max="59" value="00"><input type="number" placeholder="00" name="horaComienzo{{ $dia }}" class="upload-input-horadia" min="0" max="23" value="00">

            @endforeach

            <input type="submit" name="boton-submit" value="&#8249; Volver" class="upload-button-volver">
            <input type="submit" name="boton-submit" value="SIGUIENTE" class="upload-button-submit">

          </form>

        </div>

        <div class="upload-div-sideimage3"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
