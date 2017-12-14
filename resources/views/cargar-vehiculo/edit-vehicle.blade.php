@extends('layouts.app')
@section('title') Editar Vehiculo @endsection
@section('signin')

  @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif
  <div class="content">
    <div class="bodies-main-content">
      <hr>
      <h1>Editá los datos de tu Vehiculo</h1>
      <div class="clear"></div>

      <form class="" action="{{ route('edit.vehicle', $vehiculo) }}" method="post" style="display:inline">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @include('cargar-vehiculo._form-vehicle')

        <input type="submit" name="" value="Cargar vehiculo" class="btn btn-success" style="margin-left:15px;" onsubmit="confirm('¿Eliminar Vehiculo?')">
      </form>
        <input type="submit" name="" value="Cancelar cambios" class="btn btn-warning" onclick="confirmar()">
      </a>
    </div>
  </div>

  <script>
  function confirmar(e) {
    if (confirm('¿Cancelar cambios y volver al perfil?')) {
      window.location.replace("{{ route('profile')}}");
    } else {
        e.preventDefault();
      }
    }
  </script>


@endsection
