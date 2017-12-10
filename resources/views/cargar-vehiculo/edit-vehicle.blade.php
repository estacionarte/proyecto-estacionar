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
    <input type="submit" name="" value="Cancelar cambios" class="btn btn-warning" onclick="return confirm('¿Desea Cancelar y volver al Perfil?')">
  </a>

@endsection
