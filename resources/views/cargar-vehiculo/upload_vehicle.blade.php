@extends('layouts.app')
@section('title') Cargar Vehiculo @endsection
@section('signin')

  @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

  <h2>Cargar Vehiculo</h2>
  <form class="" action="{{ route('create.upload.vehicle') }}" method="post">
    {{ csrf_field() }}

    @include('cargar-vehiculo._form-vehicle')

    <input type="submit" name="" value="Cargar vehiculo" class="btn btn-success">
</form>

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
