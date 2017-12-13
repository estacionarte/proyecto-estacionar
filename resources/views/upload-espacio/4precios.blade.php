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
              <input type="text" placeholder="0,75" name="precioPorMinuto" class="upload-input-precioPorMinuto" value="{{ old('precioPorMinuto', $espacio->precioAutosMinuto) }}">
              <label for="" class="upload-label-precioPorMinuto">por minuto</label>
            </div>

            <label for="" class="upload-label-titulo">¿Cuál va a ser el descuento para alquileres prolongados?</label>

            <div class="upload-div-precio">
              <input type="number" placeholder="20" name="descuentoPorMinutoHora" class="upload-input-descuentoPorMinuto" value="{{ old('descuentoPorMinutoHora', $espacio->descuentos()->where('hora',1)->first() ? $espacio->getDescuento(1)*100 : '') }}">
              <label for="" class="upload-label-descuentoPorMinutoPorcentaje">%</label>
              <label for="" class="upload-label-descuentoPorMinuto">por minuto a partir de la hora</label>
            </div>
            <p class="upload-p-descuentoPorMinuto">Precio por hora con descuento: $<b id="precioHora">36</b></p>

            <div class="upload-div-precio">
              <input type="number" placeholder="35" name="descuentoPorMinutoSeisHoras" class="upload-input-descuentoPorMinuto" value="{{ old('descuentoPorMinutoSeisHoras', $espacio->descuentos()->where('hora',6)->first() ? $espacio->getDescuento(6)*100 : '') }}">
              <label for="" class="upload-label-descuentoPorMinutoPorcentaje">%</label>
              <label for="" class="upload-label-descuentoPorMinuto">por minuto a partir de 6 horas</label>
            </div>
            <p class="upload-p-descuentoPorMinuto">Precio cada 6 horas con descuento: $<b id="precioSeisHoras">175,60</b></p>

            <div class="upload-div-precio">
              <input type="number" placeholder="70" name="descuentoPorMinutoDia" class="upload-input-descuentoPorMinuto" value="{{ old('descuentoPorMinutoDia', $espacio->descuentos()->where('hora',24)->first() ? $espacio->getDescuento(24)*100 : '') }}">
              <label for="" class="upload-label-descuentoPorMinutoPorcentaje">%</label>
              <label for="" class="upload-label-descuentoPorMinuto">por minuto a partir del día</label>
            </div>
            <p class="upload-p-descuentoPorMinuto">Precio por día con descuento: $ <b id="precioDia">324</b></p>

            <input type="submit" name="boton-volver" value="&#8249; Volver" class="upload-button-volver" formaction="{{ route('upload.espacio.3', $espacio) }}" formmethod="get">
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
      <div class="clear"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

  <script type="text/javascript">

  // Cálculo de precios con descuentos aplicados en upload espacio precios

  // Defino el precio en una variable y actualizo su valor y los totales por hora cada vez que cambia
  var precioPorMinuto = document.querySelector('input[name="precioPorMinuto"]');
  if (precioPorMinuto.value) {
    precio = parseInt(precioPorMinuto.value.replace(',','.'));
  } else {
    precio = 0;
  }
  debugger;

  precioPorMinuto.onchange = function(){
    precio = Math.round(precioPorMinuto.value.replace(',','.') * 100) / 100;
    actualizarTodo();
  }

  var descuentoPorMinutoHora = document.querySelector('input[name="descuentoPorMinutoHora"]');
  var precioHora = document.getElementById('precioHora');
  descuentoPorMinutoHora.onchange = function(){actualizarDescuentoHora();}

  var actualizarDescuentoHora = function(){
    if (descuentoPorMinutoHora.value) {
      descuento = parseInt(descuentoPorMinutoHora.value)/100;
    } else {
      descuento = 0;
    }
    precioHora.textContent = Math.round((1 - descuento) * precio * 60);
  }

  var descuentoPorMinutoSeisHoras = document.querySelector('input[name="descuentoPorMinutoSeisHoras"]');
  var precioSeisHoras = document.getElementById('precioSeisHoras');
  descuentoPorMinutoSeisHoras.onchange = function(){actualizarDescuentoSeisHoras();}

  var actualizarDescuentoSeisHoras = function(){
    if (descuentoPorMinutoSeisHoras.value) {
      descuento = parseInt(descuentoPorMinutoSeisHoras.value)/100;
    } else {
      descuento = 0;
    }
    precioSeisHoras.textContent = Math.round((1 - descuento) * precio * 60 * 6);
  }

  var descuentoPorMinutoDia = document.querySelector('input[name="descuentoPorMinutoDia"]');
  var precioDia = document.getElementById('precioDia');
  descuentoPorMinutoDia.onchange = function(){actualizarDescuentoDia();}

  var actualizarDescuentoDia = function(){
    if (descuentoPorMinutoDia.value) {
      descuento = parseInt(descuentoPorMinutoDia.value)/100;
    } else {
      descuento = 0;
    }
    precioDia.textContent = Math.round((1 - descuento) * precio * 60 * 24);
  }

  var actualizarTodo = function(){
    actualizarDescuentoHora();
    actualizarDescuentoSeisHoras();
    actualizarDescuentoDia();
  }
  actualizarTodo();

  </script>

@endsection
