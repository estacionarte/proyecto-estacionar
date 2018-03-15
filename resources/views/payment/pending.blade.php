@extends('layouts.app')
@section('title') Mis Alquileres @endsection
@section('content')
@include('profile.nav-bar-profile')

  {{-- @if (!empty($reserva)) --}}
  {{-- @endif --}}

  <div id="modal-profile-alquiler" class="modal-fullscreen modal-prof-alq" style="display:block;">
    <div class="modal-content content-prof-alq">
      {{-- @if (!empty($reserva) && $reserva == 'alquiler') --}}
        {{-- <h2>¡Alquiler exitoso!</h2> --}}
      {{-- @elseif (!empty($reserva) && $reserva == 'alquiler') --}}
        <h2>Pago en proceso</h2>
        {{-- <h3>Ahora solo resta esperar la confirmación del anfitrión.</h3> --}}
      {{-- @endif --}}

      <hr style="margin-top:20px;"><hr><hr style="margin-bottom:20px;">

      <h4>CONSIDERACIONES IMPORTANTES</h4>

      <ul>
        <li>Respetá los tiempos de llegada y partida. Otras personas podrían usar el espacio después de tu horario de reserva y una demora los afectaría.</li>
        <hr>
        <li>Se recomienda llegar 5 minutos antes del horario de partida.</li>
        <hr>
        <li>Si no te vas a tiempo, se te seguirá cobrando con un 20% adicional de penalidad.</li>
        <hr>
        <li>Podés modificar la reserva si necesitás mas tiempo, siempre y cuando el espacio esté disponible.</li>
      </ul>

      <a id="entendido" href="{{ route('profile.alquileres') }}">ENTENDIDO</a>
    </div>
  </div>

@endsection

@section('scripts')

@endsection
