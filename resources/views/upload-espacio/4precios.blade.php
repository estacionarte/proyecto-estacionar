@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEspacio-progressBar">
        <div class="uploadEspacio-progressBar-progress4"></div>
      </div>

      <h1>Cargar Espacio - Precio</h1>

      <section class="uploadEspacio">

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

        <div class="form-generico">

          <form action="{{ route('insert.upload.espacio.resumen', $espacio) }}" method="post" class="form-uploadEspacio form-reducido">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <label for="" class="upload-label-titulo">¿Cuál va a ser el precio por minuto de tu espacio?</label>

            <div class="upload-div-precio">
              <label for="" class="upload-label-precioPorMinutoSigno">$</label>
              <input type="number" placeholder="0,75" name="precioPorMinuto" class="upload-input-precioPorMinuto" min="0" max="100" value="{{ old('precioPorMinuto', $espacio->precioAutosMinuto) }}">
              <label for="" class="upload-label-precioPorMinuto">por minuto</label>
            </div>

            <label for="" class="upload-label-titulo">¿Cuál va a ser el descuento para alquileres prolongados?</label>

            <div class="upload-div-precio">
              <input type="number" placeholder="20" name="descuentoPorMinutoHora" class="upload-input-descuentoPorMinuto" min="0" max="99" value="{{ old('descuentoPorMinutoHora', $espacio->descuentos()->where('hora',1)->first() ? $espacio->getDescuento(1)*100 : '') }}">
              <label for="" class="upload-label-descuentoPorMinutoPorcentaje">%</label>
              <label for="" class="upload-label-descuentoPorMinuto">por minuto a partir de la hora</label>
            </div>
            <p class="upload-p-descuentoPorMinuto">Precio por hora con descuento: $36</p>

            <div class="upload-div-precio">
              <input type="number" placeholder="35" name="descuentoPorMinutoSeisHoras" class="upload-input-descuentoPorMinuto" min="0" max="99" value="{{ old('descuentoPorMinutoSeisHoras', $espacio->descuentos()->where('hora',6)->first() ? $espacio->getDescuento(6)*100 : '') }}">
              <label for="" class="upload-label-descuentoPorMinutoPorcentaje">%</label>
              <label for="" class="upload-label-descuentoPorMinuto">por minuto a partir de 6 horas</label>
            </div>
            <p class="upload-p-descuentoPorMinuto">Precio cada 6 horas con descuento: $175,50</p>

            <div class="upload-div-precio">
              <input type="number" placeholder="70" name="descuentoPorMinutoDia" class="upload-input-descuentoPorMinuto" min="0" max="99" value="{{ old('descuentoPorMinutoDia', $espacio->descuentos()->where('hora',24)->first() ? $espacio->getDescuento(24)*100 : '') }}">
              <label for="" class="upload-label-descuentoPorMinutoPorcentaje">%</label>
              <label for="" class="upload-label-descuentoPorMinuto">por minuto a partir del día</label>
            </div>
            <p class="upload-p-descuentoPorMinuto">Precio por día con descuento: $324</p>

            <input type="submit" name="boton-submit" value="&#8249; Volver" class="upload-button-volver">
            <input type="submit" name="boton-submit" value="SIGUIENTE" class="upload-button-submit">

          </form>

          <section class="upload-section-help">
            <div class="upload-section-div-help">
              <h3>Descuentos</h3>
              <p>Los descuentos se recomiendan para promover alquileres de mayor duración.</p>
            </div>
          </section>

        </div>

        <div class="upload-div-sideimage4"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
