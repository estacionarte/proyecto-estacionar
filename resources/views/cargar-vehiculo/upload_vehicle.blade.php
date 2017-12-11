@extends('layouts.app')
@section('title') Cargar Vehiculo @endsection
@section('signin')

  @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif
  <div class="container">
    <div class="bodies-main-content">
      <hr>
      <h1>Cargá los datos de tu Vehiculo</h1><br>
      <form class="" action="{{ route('create.upload.vehicle') }}" method="post">
        {{ csrf_field() }}

        @include('cargar-vehiculo._form-vehicle')

        <input type="submit" name="" value="Cargar vehiculo" class="btn btn-success" style="margin-left:15px;">
    </form>
    </div>
  </div>


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
@endsection
