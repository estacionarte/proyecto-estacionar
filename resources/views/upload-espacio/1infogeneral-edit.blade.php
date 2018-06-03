@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('leaflet')
  <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css')}}">
  <script src="{{ URL::asset('js/leaflet.js')}}"></script>
@endsection
@section('content')

  <div class="bodies-main-content upload-espacio">
    <div class="gral-main">
      <h1>Editar Espacio - Información General</h1>
      <section class="signin upload">
        <div class="progress uploadEspacio-progressBar">
            <div class="determinate"></div>
        </div>

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

          <form action='{{ route('insert.upload.espacio.2', $espacio) }}' method="post" enctype="multipart/form-data" class="form-uploadEspacio">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            @include('upload-espacio._form-infogeneral')

            @foreach ($fotos as $foto)
              <div class="col s10 offset-s3 m5 offset-m1">
                <div class="upload-div-foto">
                  <img src="/storage/espacios/{{ $foto->photoname }}" alt="" class="upload-img-foto">
                  <div class="upload-div-div-foto">
                    <label for="{{ $foto->id }}" class="upload-label-deletefoto">ELIMINAR</label>
                  </div>
                </div>
              </div>
            @endforeach

            <div class="col s10 offset-s1 right-align boton">
                <button class="btn waves-effect waves-light  red darken-2" type="submit" name="boton-submit">SIGUIENTE
                    <i class="material-icons right">send</i>
                </button>
            </div>
          </form>
          @foreach ($fotos as $foto)
            <form method="POST" action="{{ route('deletepic.upload.espacio', $foto->id) }}" onsubmit="return confirm('¿Está seguro de que quiere eliminar esta foto?')">
              {{ method_field('DELETE') }}
  					  {{ csrf_field() }}

  					  <button type="submit" id="{{ $foto->id }}" style="display:none;"></button>
            </form>
          @endforeach
        </div>

        <div class="upload-div-sideimage"></div>

      </section>
      <div class="clear"></div>
    </div>
  </div>

@endsection

@section('scripts')
  <script>
      // SELECT DE FORMULARIO
        $(document).ready(function() {
          $('select').material_select();
        });
  </script>
  <script src="{{ URL::asset('js/upload-espacio/1infogeneral.js')}}"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkuJOGY0hwpTRHHsCoxPLc_1Bcv_sUIHk&v=3&callback=initMap&libraries=places">
  </script>
@endsection
