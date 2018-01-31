@extends('layouts.app')
@section('title') Mis Espacios @endsection
@section('content')
@include('profile.nav-bar-profile')

<div class="profile-espacio-container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#todos"><label>Todos</label></a></li>
    <li><a data-toggle="tab" href="#publicados"><label>Publicados</label></a></li>
    <li><a data-toggle="tab" href="#revision"><label>En revisión</label></a></li>
    <li><a data-toggle="tab" href="#ocultos"><label>Ocultos</label></a></li>
    <div class="">
    <a href="{{route ('upload.espacio.1') }}"><button type="button" class="btn btn-success .cargar-vehiculo-btn" >Cargá un Espacio</button></a>
  </div>
  </ul>

  <div class="tab-content">
    <div id="todos" class="tab-pane fade in active">
      <h4>Todos mis Espacios</h4>
      @forelse ($espacios as $espacio)
        <div class="carga-main-espacio">
          <div class="carga-espacio-container">
            @if (\Auth::user()->espacios()->where('id',$espacio->id)->first()->fotos->count() != 0)
              <a href="{{ route('show.espacio', $espacio->id) }}"><img class="upload-espacio" src="storage/espacios/{{\Auth::user()->espacios()->where('id',$espacio->id)->first()->fotoPortada()}}"></a>
          </div>
              <div class="espacio-dire">
                {{$espacio->direccion}}
              </div>
              <div class="espacio-descripcion">
                {{$espacio->tipoEspacio}}
              </div>
              <a href="{{ route('editar.upload.espacio.1', $espacio->id) }}">
                <button type="button" class="btn btn-default">Editar</button>
              </a>
              <form method="POST" action="{{ route('delete.espacio', $espacio->id) }}" style="display:inline;" onsubmit="return confirm('¿Está seguro de que quiere eliminar este espacio?')">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
              <div class="clear"></div>
        </div>
          @else
            <div>
            <a href="{{ route('editar.upload.espacio.1', $espacio->id) }}"><img class="upload-vehicle" src="storage/espacios/noespacio.jpg"></a>
            </div>
            @endif
      @empty
      @endforelse
    </div>

    <div id="publicados" class="tab-pane fade">
      <h4>publicados</h4>
      <p>SE MUESTRAN LOS ESPACIOS PUBLICADOS APROBADOS</p>
    </div>

    <div id="revision" class="tab-pane fade">
      <h4>revision</h4>
      <p>SE MUESTRAN LOS ESPACIOS QUE AUN NO FUERON APROBADOS NI RECHAZADOS</p>
    </div>

    <div id="ocultos" class="tab-pane fade">
      <h4>ocultos</h4>
      <p>SE MUESTRAN LOS ESPACIOS QUE EL USUARIO ELIGIÓ OCULTAR</p>
    </div>
  </div>
</div>

@endsection
