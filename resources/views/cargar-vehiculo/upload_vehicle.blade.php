@extends('layouts.app')
@section('title') Cargar Vehiculo @endsection
@section('content')

  <div class="bodies-main-content">
    <div class="gral-main">

      <h1>Cargá los datos de tu Vehiculo</h1>

      <section class="signin upload">
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

        <form class="" action="{{ route('create.upload.vehicle') }}" method="post">
          {{ csrf_field() }}

          @include('cargar-vehiculo._form-vehicle')

            <div class="col s12  center-align boton">
                <button class="btn waves-effect waves-light" type="submit">Cargar vehículo
                    <i class="material-icons right">send</i>
                </button>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>

{{-- <script src="{{ URL::asset('js/materialize.min.js')}}"></script> --}}
<script>
    // SELECT DE FORMULARIO
      $(document).ready(function() {
        $('select').material_select();
      });
</script>
      <script type="text/javascript">
        function mostrarMarca() {
          var mostrar = document.getElementById("vehiculo").value;
          if (mostrar == -1 || mostrar == 'Bicicleta') {
            document.getElementById("vehiculo-marca").disabled = true;
          }else {
            document.getElementById("vehiculo-marca").disabled = false;
          }
        }

      </script>

      <script type="text/javascript">
        // REGEX para Patente
        regexPatente = /^[A-Za-z]{3}[0-9]{3}$/i;

        var patente = document.querySelector('input[name="patente"]');

        patente.addEventListener('change',function(){
          if (!regexPatente.test(patente.value)) {
            alert('Ingresar patente tipo AAA000');
          }
        })

      </script>
@endsection
