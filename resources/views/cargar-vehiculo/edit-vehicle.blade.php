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
        <input type="submit" name="" value="Cancelar cambios" class="btn btn-warning" onclick="myFunction()">
      </a>
    </div>
  </div>

  <script>
  function myFunction(e) {
    if (confirm('¿Cancelar cambios y volver al perfil?')) {
    window.location.replace("{{ route('profile')}}");
} else {
  e.preventDefault();
}

  }
  </script>
    {{-- <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <h4 class="modal-title">ATENCIÓN</h4>
          </div>
          <div class="modal-body">
            <p>¿Cancelas los cambios y vovles tu Perfil?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    document.getElementById("cerrar-modal").onclick = function(){
      window.location.href = "{{ route('profile')}}"
    }
  </script> --}}

  <script type="text/javascript">
    // REGEX para Patente
    regexPatente = ^[A-Za-z]{3}-[0-9]{3}$;

    var patente = document.querySelector('input[name="patente"]');

    patente.addEventListener('change',function(){
      console.log(regexPatente.test(patente.value));
    })

  </script>

@endsection
