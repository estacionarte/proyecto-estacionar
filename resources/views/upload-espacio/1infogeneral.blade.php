@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('scripts') @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEspacio-progressBar">
        <div class="uploadEspacio-progressBar-progress1"></div>
      </div>

      <h1>Cargar Espacio - Información General</h1>

      <section class="uploadEspacio">

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

        <div class="form-generico">

          <form action='{{ route('create.espacio.upload.espacio.2') }}' method="post" enctype="multipart/form-data" class="form-uploadEspacio">
            {{ csrf_field() }}

            @include('upload-espacio._form-infogeneral')
            <input type="text" name="location" id="location" hidden="hidden">
            <input type="submit" name="boton-submit" value="SIGUIENTE">
          </form>

        </div>

        <div class="upload-div-sideimage"></div>

      </section>
      <div class="clear"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  {{-- <script src="js/menu.js"></script> --}}
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSkfauiLSZEhmyR3Yti92BCrmMCFbqB0Y&libraries=places&callback=autocompletarDomicilio" async defer></script>
  <script type="text/javascript">
    function autocompletarDomicilio() {
      var input = document.getElementById('pac-input');
      var autocomplete = new google.maps.places.Autocomplete(input);

      autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        window.place = place;
        if (!place.geometry) {
          // User entered the name of a Place that was not suggested and
          // pressed the Enter key, or the Place Details request failed.
          window.alert("No details available for input: '" + place.name + "'");
          return;
        } else {
          var latLng = place.geometry.location.lat() + ' ' + place.geometry.location.lng();
          espacio_location = document.getElementById("location");
          espacio_location.value = latLng;
        }
      })
    }
  </script>



  <script type="text/javascript">
  // Script para dar funcionalidad a botones - y +

  var sumar = function sumar(){
    var input = this.parentNode.querySelector('input');
    if (input.value == 10) {
      return;
    } else {
      if (input.value == 0) {
        input.value = 1;
      } else {
        input.value = parseInt(input.value) + 1;
      }
    }
  }

  var restar = function restar(){
    var input = this.parentNode.querySelector('input');
    if (input.value == 0) {
      return;
    } else {
      input.value = parseInt(input.value) - 1;
    }
  }

  // Funcionalidad a botones de suma y resta en upload espacio info general
  var botonSumarAuto = document.querySelector('button[name="boton-suma-auto"]');
  var autos = document.querySelector('input[name="cantAutos"]');
  var botonRestarAuto = document.querySelector('button[name="boton-resta-auto"]');
  botonSumarAuto.addEventListener('click', sumar);
  botonRestarAuto.addEventListener('click', restar);

  var botonSumarMoto = document.querySelector('button[name="boton-suma-moto"]');
  var motos = document.querySelector('input[name="cantMotos"]');
  var botonRestarMoto = document.querySelector('button[name="boton-resta-moto"]');
  botonSumarMoto.addEventListener('click', sumar);
  botonRestarMoto.addEventListener('click', restar);

  var botonSumarBicicleta = document.querySelector('button[name="boton-suma-bici"]');
  var bicis = document.querySelector('input[name="cantBicicletas"]');
  var botonRestarBicicleta = document.querySelector('button[name="boton-resta-bici"]');
  botonSumarBicicleta.addEventListener('click', sumar);
  botonRestarBicicleta.addEventListener('click', restar);

  </script>

  <script type="text/javascript">
  // Script para hacer ajax calls y llenar los campos de países y provincias

  </script>

@endsection
