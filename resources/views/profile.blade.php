@extends('layouts.app')
@section('title') Mi Perfil @endsection
@section('content')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <main class="main-profile-nav">

        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1">Mi perfil</label>

        <input id="tab2" type="radio" name="tabs">
        <label for="tab2">Mis Vehículos</label>

        <input id="tab3" type="radio" name="tabs">
        <label for="tab3">Mis espacios</label>

        <input id="tab4" type="radio" name="tabs">
        <label for="tab4">Reputación</label>

        <section id="content1">

          <div class="profile-image">
            <img src="storage/profilePic/{{Auth::user()->profilePic}}" alt="profile image"><br>
            <a href="{{route ('show.update.profile.image') }}">Cambiar mi imagen de perfil</a><br><br><br>
          </div>

          <div class="profile-welcome">
            <h1>¡Bienvenido {{Auth::user()->firstName}}!</h1>
          </div>

          <article class="profile-credit">
            <h2>¡Invitá a tus amigos y obtené créditos para estacionar!</h2>
            <p>Conseguí hasta %50 de descuento en tu próximo alquiler.</p>
            <a href="credits.php">CONSEGUIR CRÉDITO</a>
          </article><br>

          <article class="profile-credit">
              <h2>Cambia el estilo de tu página</h2>
              <select id="styleChange">
               <option value="{{ asset('css/styles.css') }}">Estilo original</option>
               <option value="{{ asset('css/styles2.css') }}">Estilo alternativo</option>
              </select>
          </article>

          <!-- SCRIPT CSS -->
          <script type="text/javascript">
            document.getElementById("styleChange").addEventListener('change', function () {
            document.getElementById('hojaDeEstilo').href = this.value;
            // localStorage.setItem("css", "{{ asset('css/styles2.css') }}");
            // localStorage.setItem("css", this.value);
            localStorage.setItem('css', document.getElementById('hojaDeEstilo').href);
          });
          </script>

          <div>
            <div class="clear"></div>
            <article class="verified-information">
              <ul>
                <li class="verified-information-title">Información verificada</li>
                <li>Documento de identidad <img src="icons/check-no.png"></li>
                <li>Correo electrónico <img src="icons/check-yes.png"></li>
                <li>Número telefónico <img src="icons/check-no.png"></li>
                <li><a href="#">Verificar mis datos</a></li>
                <li class="ask-verify-data"><a href="#openModal"><img src="icons/ask-verify-data.png"></a></li>
              </ul>
            </article>

            <div id="openModal" class="modalDialog">
            	<div>
            		<a href="#close" title="Close" class="close">X</a>
            		<h3>¿Para qué verificar mis datos?</h3>
            		<p>Es importante verificar los datos personales para mantener un ámbito de confianza entre los usuarios registrados.</p>
            	</div>
            </div>
          </div>
        </section>

        <section id="content2">
          <h1>Mis Vehículos</h1>
          <div class="clear"></div>

          <article class="carga-vehiculo-container">
          <a href="{{route ('show.upload.vehicle') }}"><button type="button" class="btn btn-success .cargar-vehiculo-btn">Cargá tus Vehiculos</button></a>
        </article><br><br><br>

          <table class="table table-hover">
            <thead>
              <tr class="active">
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
                  <tr class="warning">
                    <td>{{$vehiculo->tipoVehiculo}}</td>
                    <td>{{$vehiculo->marca}}</td>
                    <td>{{$vehiculo->modelo}}</td>
                    <td>{{$vehiculo->color}}</td>
                    <td>{{$vehiculo->patente}}</td>
                    <td>
                      <a href="{{ route('show.edit.vehicle', $vehiculo->id) }}">
                        <button type="button" class="btn btn-default">Editar</button>
                      </a>
                      <form method="POST" action="{{ route('delete.vehicle', $vehiculo->id) }}" style="display:inline;" onsubmit="return confirm('¿Eliminar Vehiculo?')">
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
        </section>

        <section id="content3">
          <h1>Mis Espacios</h1>
          <div class="clear"></div>

          <article class="carga-vehiculo-container">
          <a href="{{route ('upload.espacio.1')}}"><img class="upload-vehicle" src="images/upload.png"></a>
            <p>Cargá tus Espacios</p>
          </article>

          @forelse ($espacios as $espacio)
            <article class="carga-vehiculo-container">
              @if (\Auth::user()->espacios()->where('id',$espacio->id)->first()->fotos->count() != 0)
                <a href="{{ route('editar.upload.espacio.1', $espacio->id) }}"><img class="upload-vehicle" src="storage/espacios/{{\Auth::user()->espacios()->where('id',$espacio->id)->first()->fotoPortada()}}"></a>
              @else
                <a href="{{ route('editar.upload.espacio.1', $espacio->id) }}"><img class="upload-vehicle" src="storage/espacios/noespacio.jpg"></a>
              @endif
              <br>{{$espacio->direccion}}
            </article>
          @empty
          @endforelse
        </section>

        <section id="content4">
          <h1>Reputación</h1>


        </section>

      </main>

    </div>
  </div>
  <!-- <script>
  function initMap() {
    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(input);
  };
  </script> -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSkfauiLSZEhmyR3Yti92BCrmMCFbqB0Y&libraries=places&callback=initMap" async defer></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script> -->
  <script>
    $('.avatar').click(function(){
      $('.profile-nav').slideToggle(100);
    });
  </script>
@endsection
