@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('leaflet')
  <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css')}}">
  <script src="{{ URL::asset('js/leaflet.js')}}"></script>
@endsection
@section('content')

  <div class="bodies-main-content upload-espacio">
    <div class="gral-main">
      <h1>Cargar Espacio - Información General</h1>
      <section class="signin upload">
        {{-- <div class="uploadEspacio-progressBar">
          <div class="uploadEspacio-progressBar-progress1"></div>
        </div> --}}
        <div class="progress uploadEspacio-progressBar">
            <div class="determinate"></div>
        </div>

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif


          <form action='{{ route('create.espacio.upload.espacio.2') }}' method="post" enctype="multipart/form-data" class="form-uploadEspacio">
            {{ csrf_field() }}

            @include('upload-espacio._form-infogeneral')

            <div class="col s10 offset-l1 right-align boton">
                <button class="btn waves-effect waves-light  red darken-2" type="submit" name="boton-submit">SIGUIENTE
                    <i class="material-icons right">send</i>
                </button>
            </div>
          </form>
        </section>
      </div>
        <div class="upload-div-sideimage"></div>
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
