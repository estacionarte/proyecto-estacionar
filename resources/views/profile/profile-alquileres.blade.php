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
    <h4 class="alq-title">Historial de Alquileres</h4>
    <div id="alquiler-anfitrion" class="tab-pane fade in active">
      <div class="alquileres-tipo">

        <h3>Alquileres Futuros</h3>

        <div class="alquileres-content-detalle">
          <h4>02/02/18 - Cochera privada en recoleta</h4>
          <p>02/02/18 16:00 - 02/02/18 20:00 <span class="span-alquilar-editar">EDITAR</span></p>
          <p><span class="span-underline">Precio</span>: $105</p>
        </div>

        <div class="alquileres-content-detalle">
          <h4>04/02/18 - Cochera cerca del monumental</h4>
          <p>04/02/18 08:40 - 04/02/18 18:30 <span class="span-alquilar-editar">EDITAR</span></p>
          <p><span class="span-underline">Precio</span>: $180</p>
        </div>
      </div>

        <div class="alquileres-tipo">

          <h3>Alquileres Pasados</h3>

          <div class="alquileres-content-detalle">
            <h4>01/05/18 - Espaciosa cochera en palermo</h4>
            <p>01/05/18 09:00 - 02/05/18 19:00</p>
            <p><span class="span-underline">Precio</span>: $220</p>
            <p><span class="span-underline">Calificación</span>: 4/5</p>
            <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
          </div>

          <div class="alquileres-content-detalle">
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

        <h3>Alquileres Futuros</h3>

        <div class="alquileres-content-detalle">
          <h4>06/02/18 - Cochera de lujo</h4>
          <p>06/02/18 15:00 - 06/02/18 20:45 <span class="span-alquilar-delete">CANCELAR</span></p>
          <p><span class="span-underline">Precio</span>: $115</p>
        </div>

        <div class="alquileres-content-detalle">
          <h4>04/02/18 - Amplia cochera en recoleta</h4>
          <p>09/02/18 09:15 - 09/02/18 18:50 <span class="span-alquilar-delete">CANCELAR</span></p>
          <p><span class="span-underline">Precio</span>: $180</p>
        </div>

      </div>

      <div class="alquileres-tipo">
      <h3>Alquileres Pasados</h3>
      <div class="alquileres-content-detalle">
        <h4>01/01/18 - Cochera Puerto Madero</h4>
        <p>01/01/18 15:00 - 02/05/18 19:00</p>
        <p><span class="span-underline">Precio</span>: $60</p>
        <p><span class="span-underline">Calificación</span>: 4/5</p>
        <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
      </div>

      <div class="alquileres-content-detalle">
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
  <script>
  $('.alquileres-content-detalle').click(function (){
    $('p', this).slideToggle(170);
  });
  </script>

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
