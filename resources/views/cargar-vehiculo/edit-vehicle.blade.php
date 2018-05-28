@extends('layouts.app')
@section('title') Editar Vehiculo @endsection
@section('content')

  <div class="bodies-main-content">
    <div class="gral-main">

      <h1>Editá los datos de tu Vehiculo</h1>

      <section class="signin upload">
        @if (count($errors) > 0)
              @foreach ($errors->all() as $error)
                <p style="color: #990606;"> {{ $error }} </p>
              @endforeach
        @endif

      <form class="" action="{{ route('edit.vehicle', $vehiculo) }}" method="post" style="display:inline">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @include('cargar-vehiculo._form-vehicle')

          <div class="col s5 m5 offset-m1 center-align boton">
              <button class="btn waves-effect waves-light" type="submit">Cargar vehículo
                  <i class="material-icons right">send</i>
              </button>
          </div>

          <div class="col s5 m5 center-align boton">
            <button class="btn waves-effect waves-light" type="submit" onclick="confirmar()">Cancelar cambios
              <i class="material-icons right">send</i>
            </button>
          </div>
      </form>
    </section>
    </div>
    </div>
  </div>

  <script>
    // SELECT DE FORMULARIO
      $(document).ready(function() {
        $('select').material_select();
      });
  </script>
  <script>
  function confirmar(e) {
    if (confirm('¿Cancelar cambios y volver al perfil?')) {
      window.location.replace("{{ route('profile-vehiculo')}}");
    } else {
        e.preventDefault();
      }
    }
  </script>


  <script type="text/javascript">
    // REGEX para Patente
    regexPatente = ^[A-Za-z]{3}-[0-9]{3}$;

    var patente = document.querySelector('input[name="patente"]');

    patente.addEventListener('change',function(){
      console.log(regexPatente.test(patente.value));
    })

  </script>

@endsection
