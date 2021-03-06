@extends('layouts.app')
@section('title') Mis Alquileres @endsection
@section('content')
@include('profile.nav-bar-profile')

<div class="profile-alquiler-container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#alquiler-anfitrion"><label>Como anfitrión</label></a></li>
    <li><a data-toggle="tab" href="#alquiler-conductor"><label>Como conductor</label></a></li>
  </ul>

  <div class="tab-content">
    <h4 class="alq-title">Mis Alquileres</h4>
    <div id="alquiler-anfitrion" class="tab-pane fade in active">
      <div class="alquileres-tipo">

        <h3>Próximos Alquileres</h3>

        <div class="alquileres-content-detalle">
          <div class="img-alq-container">
            <img src="/storage/espacios/33-1.jpeg" alt="">
          </div>
          <h4>Cochera privada en recoleta</h4>
          <p>Del 02/02/18 a las 16:00 hasta el 02/02/18 las 20:00</p>
          <p class="valor">Valor: $105</p>
          <a href="">
            <button type="button" class="btn btn-default">Editar</button>
          </a>
          <form method="POST" action="" style="display:inline;" onsubmit="return confirm('¿Está seguro de que quiere Cancelar este alquiler?')">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Cancelar</button>
          </form>
        </div>

        <div class="clear"></div>

        <div class="alquileres-content-detalle">
          <div class="img-alq-container">
            <img src="/storage/espacios/33-1.jpeg" alt="">
          </div>
          <h4>04/02/18 - Cochera cerca del monumental</h4>
          <p>04/02/18 08:40 - 04/02/18 18:30</p>
          <p><span class="span-underline">Precio</span>: $180</p>
        </div>
      </div>

        <div class="clear"></div>

        <div class="alquileres-tipo">

          <h3>Alquileres Anteriores</h3>

          <div class="alquileres-content-detalle">
            <div class="img-alq-container">
              <img src="/storage/espacios/33-1.jpeg" alt="">
            </div>
            <h4>01/05/18 - Espaciosa cochera en palermo</h4>
            <p>01/05/18 09:00 - 02/05/18 19:00</p>
            <p><span class="span-underline">Precio</span>: $220</p>
            <p><span class="span-underline">Calificación</span>: 4/5</p>
            <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
            <a href="">
              <button type="button" class="btn btn-default">Editar</button>
            </a>
            <form method="POST" action="" style="display:inline;" onsubmit="return confirm('¿Está seguro de que quiere Borrar este alquiler del historial?')">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
          </div>

          <div class="clear"></div>

          <div class="alquileres-content-detalle">
            <div class="img-alq-container">
              <img src="/storage/espacios/33-1.jpeg" alt="">
            </div>
            <h4>05/05/18 - Living de departamento</h4>
            <p>05/05/18 08:00 - 05/05/18 18:30</p>
            <p><span class="span-underline">Precio</span>: $100</p>
            <p><span class="span-underline">Calificación</span>: 5/5</p>
            <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
          </div>
        </div>
      </div>


    <div id="alquiler-conductor" class="tab-pane fade in">
      <div class="alquileres-tipo">

        <h3>Próximos Alquileres</h3>

        <div class="alquileres-content-detalle">
          <div class="img-alq-container">
            <img src="/storage/espacios/33-1.jpeg" alt="">
          </div>
          <h4>06/02/18 - Cochera de lujo</h4>
          <p>06/02/18 15:00 - 06/02/18 20:45</p>
          <p><span class="span-underline">Precio</span>: $115</p>
          <a href="">
            <button type="button" class="btn btn-default">Editar</button>
          </a>
          <form method="POST" action="" style="display:inline;" onsubmit="return confirm('¿Está seguro de que quiere Cancelar este alquiler?')">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Cancelar</button>
          </form>
        </div>

        <div class="clear"></div>

        <div class="alquileres-content-detalle">
          <div class="img-alq-container">
            <img src="/storage/espacios/33-1.jpeg" alt="">
          </div>
          <h4>04/02/18 - Amplia cochera en recoleta</h4>
          <p>09/02/18 09:15 - 09/02/18 18:50</p>
          <p><span class="span-underline">Precio</span>: $180</p>
        </div>

      </div>

      <div class="clear"></div>

      <div class="alquileres-tipo">

      <h3>Alquileres Anteriores</h3>

      <div class="alquileres-content-detalle">
        <div class="img-alq-container">
          <img src="/storage/espacios/33-1.jpeg" alt="">
        </div>
        <h4>01/01/18 - Cochera Puerto Madero</h4>
        <p>01/01/18 15:00 - 02/05/18 19:00</p>
        <p><span class="span-underline">Precio</span>: $60</p>
        <p><span class="span-underline">Calificación</span>: 4/5</p>
        <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
        <a href="">
          <button type="button" class="btn btn-default">Editar</button>
        </a>
        <form method="POST" action="" style="display:inline;" onsubmit="return confirm('¿Está seguro de que quiere Borrar este alquiler del historial?')">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <button type="submit" class="btn btn-danger">Borrar</button>
        </form>
      </div>

      <div class="clear"></div>

      <div class="alquileres-content-detalle">
        <div class="img-alq-container">
          <img src="/storage/espacios/33-1.jpeg" alt="">
        </div>
        <h4>29/12/17 - Living de departamento</h4>
        <p>29/12/17 08:30 - 29/12/17 19:30</p>
        <p><span class="span-underline">Precio</span>: $110</p>
        <p><span class="span-underline">Calificación</span>: 5/5</p>
        <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
      </div>
    </div>

    </div>
  </div>

</div>


@endsection

@section('scripts')
  <script>
    $('.avatar').click(function(){
      $('.profile-nav').slideToggle(100);
    });
  </script>
  {{-- <script>
  $('.alquileres-content-detalle').click(function (){
    $('p', this).slideToggle(170);
  });
  </script> --}}

  <script>
  // Script para cerrar modal al concretar alquiler/reserva
    modal = document.getElementById("modal-profile-alquiler");
    entendido = document.getElementById("entendido");

    entendido.onclick = function() {
      modal.style.display = "none";
    }

  </script>

  <script src="{{ URL::asset('js/profile.js')}}"></script>
@endsection
