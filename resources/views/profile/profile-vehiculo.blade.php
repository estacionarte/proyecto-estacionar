@extends('layouts.app')
@section('title') Mis Vehiculos @endsection
@section('content')
@include('profile.nav-bar-profile')

<div class="profile-vehiculo-container">
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="default">
          <th>Vehiculo</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Color</th>
          <th>Patente</th>
          <th></th>
        </tr>
      </thead>
    @forelse ($vehiculos as $vehiculo)
      <div class="table-responsive">
          <tbody>
            <tr class="default">
              <td>{{$vehiculo->tipoVehiculo}}</td>
              <td>{{$vehiculo->marca}}</td>
              <td>{{$vehiculo->modelo}}</td>
              <td>{{$vehiculo->color}}</td>
              <td>{{$vehiculo->patente}}</td>
              <td>
                <a href="{{ route('show.edit.vehicle', $vehiculo->id) }}">
                  <button type="button" class="btn btn-default">Editar</button>
                </a>
                <form method="POST" action="{{ route('delete.vehicle', $vehiculo->id) }}" style="display:inline;" onsubmit="confirm('¿Eliminar Vehiculo?')">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </td>
            </tr>
          </tbody>
      </div>
    @empty
    @endforelse
    </table>

  </div>
  <article class="">
  <a href="{{route ('show.upload.vehicle') }}"><button type="button" class="btn btn-success cargar-vehiculo-btn">Cargá un Vehiculo</button></a>
  </article>
</div>

@endsection
