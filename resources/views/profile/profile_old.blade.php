@extends('layouts.app')
@section('title') Mi Perfil @endsection
@section('content')

  <div class="container">

    <div class="bodies-main-content">

      <main class="main-profile-nav">

          <input id="tab1" type="radio" name="tabs" checked>
          <label for="tab1">Mi perfil</label>

          <input id="tab2" type="radio" name="tabs">
          <label for="tab2">Mis Vehículos</label>

          <input id="tab3" type="radio" name="tabs">
          <label for="tab3">Mis espacios</label>

          <input id="tab4" type="radio" name="tabs">
          <label for="tab4">Alquileres</label>

        <section id="content1">

          <div class="profile-image">
            <img src="storage/profilePic/{{Auth::user()->profilePic}}" alt="profile image">
          </div>

          <div class="">
            <a href="{{route ('show.update.profile.image') }}">Cambiar mi imagen de perfil</a>
          </div>

          <div class="profile-welcome">
            <h1>¡Bienvenido {{Auth::user()->firstName}}!</h1>
          </div>

          <article class="profile-credit">
            <h2>¡Invitá a tus amigos y obtené créditos para estacionar!</h2>
            <p>Conseguí hasta 50% de descuento en tu próximo alquiler.</p>
            <a href="credits.php">CONSEGUIR CRÉDITO</a>
          </article><br>

          {{-- <article class="profile-credit">
              <h2>Cambia el estilo de tu página</h2>
              <select id="styleChange">
               <option value="{{ asset('css/styles.css') }}">Estilo clásico</option>
               <option value="{{ asset('css/styles2.css') }}">Estilo alternativo</option>
              </select>
          </article> --}}

          {{-- <article class="profile-credit">
              <h2>Próximos alquileres</h2>
              <p>02/02 16:00 - 02/02 19:30 Cochera privada en recoleta </p>
          </article> --}}

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
          <h2>Mis Vehículos</h2>
          <div class="clear"></div>

          <article class="">
          <a href="{{route ('show.upload.vehicle') }}"><button type="button" class="btn btn-success .cargar-vehiculo-btn">Cargá tus Vehiculos</button></a>
        </article><br><br><br>

          <div class="table-responsive">
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
        </section>

        <section id="content3">

          <h2>Mis Espacios</h2>

          <article class="carga-vehiculo-container load-vehicle">
          <a href="{{route ('upload.espacio.1')}}"><img class="upload-vehicle" src="images/upload.png"></a>
          <p>Cargá tus Espacios</p>
          </article>


          @forelse ($espacios as $espacio)
            <div class="carga-main">
              <article class="carga-vehiculo-container">
                @if (\Auth::user()->espacios()->where('id',$espacio->id)->first()->fotos->count() != 0)
                  <a href="{{ route('show.espacio', $espacio->id) }}"><img class="upload-vehicle" src="storage/espacios/{{\Auth::user()->espacios()->where('id',$espacio->id)->first()->fotoPortada()}}"></a><br>
                  </article>
                  <div class="clear"></div>
                  <div style='pie-de-espacio'>
                    {{$espacio->direccion}}
                  </div>
                  <a href="{{ route('editar.upload.espacio.1', $espacio->id) }}">
                    <button type="button" class="btn btn-default">Editar</button>
                  </a>
                  <form method="POST" action="{{ route('delete.espacio', $espacio->id) }}" style="display:inline;" onsubmit="return confirm('¿Está seguro de que quiere eliminar este espacio?')">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
            </div>

              @else
                <article class="carga-vehiculo-container">
                <a href="{{ route('editar.upload.espacio.1', $espacio->id) }}"><img class="upload-vehicle" src="storage/espacios/noespacio.jpg"></a>
              @endif
            </article>
          @empty
          @endforelse
        </section>

        <div class="clear"></div>

        <section id="content4">

          <h2>Alquileres</h2>

          <div class="alquileres-navbar">
            <div class="navbar-misespacios">
              <span>Mis Espacios</span>
            </div>
            <div class="navbar-otrosespacios">
              <span>Otros Espacios</span>
            </div>
          </div>

          <div class="alquileres-content" id="alquileres-mis-espacios">

            <div class="alquileres-tipo">

              <h3>Alquileres Futuros</h3>

              <div class="alquileres-content-detalle">
                <h4>02/02/18 - Cochera privada en recoleta</h4>
                <p>02/02/18 16:00 - 02/02/18 20:00 <span class="span-alquilar-editar">EDITAR</span></p>
                <p><span class="span-underline">Precio</span>: $105</p>
              </div>

              <div class="alquileres-content-detalle">
                <h4>04/02/18 - Cochera cerca del monumental</h4>
                <p>04/02/18 08:40 - 04/02/18 18:30 <span class="span-alquilar-editar">EDITAR</span></p>
                <p><span class="span-underline">Precio</span>: $180</p>
              </div>

            </div>

            <hr>

            <div class="alquileres-tipo">

              <h3>Alquileres Pasados</h3>

              <div class="alquileres-content-detalle">
                <h4>01/05/18 - Espaciosa cochera en palermo</h4>
                <p>01/05/18 09:00 - 02/05/18 19:00</p>
                <p><span class="span-underline">Precio</span>: $220</p>
                <p><span class="span-underline">Calificación</span>: 4/5</p>
                <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
              </div>

              <div class="alquileres-content-detalle">
                <h4>05/05/18 - Living de departamento</h4>
                <p>05/05/18 08:00 - 05/05/18 18:30</p>
                <p><span class="span-underline">Precio</span>: $100</p>
                <p><span class="span-underline">Calificación</span>: 5/5</p>
                <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
              </div>

            </div>

          </div>

          <div class="alquileres-content" id="alquileres-otros-espacios">

            <div class="alquileres-tipo">

              <h3>Alquileres Futuros</h3>

              <div class="alquileres-content-detalle">
                <h4>06/02/18 - Cochera de lujo</h4>
                <p>06/02/18 15:00 - 06/02/18 20:45 <span class="span-alquilar-delete">CANCELAR</span></p>
                <p><span class="span-underline">Precio</span>: $115</p>
              </div>

              <div class="alquileres-content-detalle">
                <h4>04/02/18 - Amplia cochera en recoleta</h4>
                <p>09/02/18 09:15 - 09/02/18 18:50 <span class="span-alquilar-delete">CANCELAR</span></p>
                <p><span class="span-underline">Precio</span>: $180</p>
              </div>

            </div>

            <hr>

            <div class="alquileres-tipo">

              <h3>Alquileres Pasados</h3>

              <div class="alquileres-content-detalle">
                <h4>01/01/18 - Cochera Puerto Madero</h4>
                <p>01/01/18 15:00 - 02/05/18 19:00</p>
                <p><span class="span-underline">Precio</span>: $60</p>
                <p><span class="span-underline">Calificación</span>: 4/5</p>
                <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
              </div>

              <div class="alquileres-content-detalle">
                <h4>29/12/17 - Living de departamento</h4>
                <p>29/12/17 08:30 - 29/12/17 19:30</p>
                <p><span class="span-underline">Precio</span>: $110</p>
                <p><span class="span-underline">Calificación</span>: 5/5</p>
                <p><span class="span-underline">Usuario</span>: Mariano Álvarez Hayes</p>
              </div>

            </div>

          </div>

        </section>

      </main>

    </div>
  </div>

@endsection


@section('scripts')
  <script>
    $('.avatar').click(function(){
      $('.profile-nav').slideToggle(100);
    });
  </script>
  <script>
  $('.alquileres-content-detalle').click(function (){
    $('p', this).slideToggle(170);
  });
  </script>
  <script src="{{ URL::asset('js/profile.js')}}"></script>
@endsection
