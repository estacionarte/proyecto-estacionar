@extends('layouts.app')
@section('title') Editar Vehiculo @endsection
@section('signin')

  @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

  <h2>Editar Datos de mi Vehiculo</h2>

  <form class="" action="{{ route('edit.vehicle', $vehiculo) }}" method="post" style="display:inline">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    @include('cargar-vehiculo._form-vehicle')

    <input type="submit" name="" value="Cargar vehiculo" class="btn btn-success">
</form>
  <a href="{{ route('profile')}}">
    <input type="submit" name="" value="Cancelar cambios" class="btn btn-warning" data-toggle="modal" data-target="#myModal" onclick="event.preventDefault();">
  </a>
  <div class="container">


    <!-- ALERT - MODAL -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">ATENCIÓN</h4>
          </div>
          <div class="modal-body">
            <p>¿Desea cancelar y vovler al Perfil?</p>
          </div>
          <div class="modal-footer">
            <button id="cerrar-modal" type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    document.getElementById("cerrar-modal").onclick = function(){
      window.location.href = "{{ route('profile')}}"
    }
  </script>
@endsection
