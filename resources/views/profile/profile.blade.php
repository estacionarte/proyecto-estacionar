@extends('layouts.app')
@section('title') Mi Perfil @endsection
@section('css')
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')

@include('profile.nav-bar-profile')

<div class="profile-container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#dashboard"><i class="fa fa-desktop"></i> <label id="infper">Información general</label></a></li>
    <li><a data-toggle="tab" href="#profile"><i class="fa fa-info-circle"></i> <label id="infper">Información personal</label></a></li>
    {{-- <li><a data-toggle="tab" href="#img-profile"><i class="fa fa-user-circle"></i><label>Imagen de perfil</label></a></li> --}}
    <li><a data-toggle="tab" href="#datos"><i class="fa fa-check-circle"></i><label>Datos verificados</label></a></li>
    <li><a data-toggle="tab" href="#creditos"><i class="fa fa-gift"></i><label>Obtener Créditos</label></a></li>
    <li><a data-toggle="tab" href="#evaluaciones"><i class="fa fa-handshake-o"></i><label>Evaluaciones</label></a></li>
  </ul>

  <div class="tab-content">
    <div id="dashboard" class="tab-pane fade in active dashboard">
      <div class="profile-welcome-tablet">
        <h4>¡Bienvenido {{Auth::user()->firstName}}!</h4>
      </div>
      <div class="imagen-load-container">
        <div class="load-img-profile">
          <form method="post" enctype="multipart/form-data" action="{{ route ('profile')}}">
            {{ csrf_field() }}
            <div class="row">
              <div class="file-field input-field">
                <div class="img-profile">
                  <img class="image" for="file-path" src="storage/profilePic/{{Auth::user()->profilePic}}" alt="profile image">
                  <img class="add" src="/images/icons/add.png">
                </div>
                <div class="btn">
                  <span>ELEGIR</span>
                  <input id="profilePic" type="file" name="profilePic" accept="image/*">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" name="file-path"  type="text">
                </div>
              </div>
              <div class="left-align btn-container">
                  <button id="cargar-foto-perfil" class="btn waves-effect waves-light teal accent-4" type="submit">Cargar foto
                      <i class="material-icons right">send</i>
                  </button>
                  <a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Para que los conductores y anfitriones se conozcan, lo mejor es añadir fotos de la cara que sean nítidas y estén sacadas de frente. No incluyas información personal o sensible que preferirías que un usuario no viera."><img src="/images/icons/ask.png"></a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="profile-derecha">
        <h3>lalalala</h3>
        <h2>dsgbdhbdsgshdg</h2>
        <p>dgdfgdfgfdgdfigndijbsdigvbsdigbdhbvdhgb</p>
      </div>
      <div class="">
        <a href="/perfilpublico">
          <button style="width: 100%;" type="button" class="btn btn-default">Ver mi perfil público</button>
        </a>
      </div>
    </div>

    <div id="profile" class="tab-pane fade">
      <div class="titulo">
        <div class="perfil-caja-titulo">
          <h4>Campos requeridos para alquilar o reservar un espacio</h4>
        </div>
        <form class="form-horizontal" method="post" action="{{ route ('profile')}}">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5 offset-l1">
                <input id="nombre" type="text" name="firstName" value="{{Auth::user()->firstName}}">
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5">
                <input id="apellido" type="text" name="lastName" value="{{Auth::user()->lastName}}">
                <label for="apellido">Apellido</label>
            </div>
            <div class="col s8 offset-s2 l10 offset-l1">
              <h5>Solo se mostrará tu nombre de pila en tu perfil público. Cuando hagas una solicitud de reservación, el anfitrión podrá ver tu nombre y apellido.</h5>
            </div>
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5 offset-l1">
              <select class="icons">
                <option value="" selected>País</option>
                <option value="{{Auth::user()->country}}" data-icon="/images/icons/argentina.png">Argentina</option>
              </select>
            </div>
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5">
             <select class="icons">
               <option value="" disabled selected>Soy</option>
               <option value="" data-icon="/images/icons/male.png">Hombre</option>
               <option value="" data-icon="/images/icons/female.png">Mujer</option>
             </select>
            </div>
            <div class="input-field col s2 offset-s2 l1 offset-l1">
                <input id="dia"  type="number" name="birthDay" min="1" max="31" value="{{$dia}}">
                <label for="dia">Dia</label>
            </div>
            <div class="input-field col s2 l1 ">
                <input id="dia"  type="number" name="birthDay" min="1" max="31" value="{{$mes}}">
                <label for="dia">Mes</label>
            </div>
            <div class="input-field col s3 l2">
                <input id="dia"  type="number" name="birthDay" value="{{$anio}}">
                <label for="dia">Año</label>
            </div>
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5 offset-l1">
                <input id="dni" type="text" name="dni" value="{{Auth::user()->dni}}">
                <label for="">DNI</label>
                <h5 style="display:inline">No compartiremos tu DNI con otros usuarios de Estacionados.</h5><a style="font-size: 14px !important;" data-toggle="tab" href="#datos"> Más información</a>
            </div>
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5 offset-l1">
                <input id="email" type="email" value="{{Auth::user()->email}}">
                <label for="email">Email</label>
                <h5>No compartiremos tu dirección de correo electrónico personal con otros usuarios de Estacionados.</h5>
            </div>
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5">
                <input id="cbu" type="text" name="cbu" value="{{Auth::user()->cbu}}">
                <label for="cbu">CBU o Alias</label>
                <h5>Proporcioná los datos de tu cbu o Alias para poder recibir las ganancias de tus alquileres. No compartiremos esta infomración con otros usuarios de Estacionados.</h5>
            </div>
            <div class="input-field col s3 offset-s2 l1 offset-l1">
                <input id="areaCode" type="number" name="areaCode" value="{{Auth::user()->areaCode}}">
                <label for="areaCode">Cod. área</label>
            </div>
            <div class="input-field col s5 l3">
                <input id="phone" type="number" name="phoneNumber" value="{{Auth::user()->phoneNumber}}">
                <label for="phone">Mi N° de teléfono</label>
                <h5>Tu número solo se compartirá cuando tengas una reservación confirmada con otro usuario de Estacionados. Es el método que utilizamos para ponernos en contacto vos.</h5>
            </div>
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5 offset-l1">
                <input id="contactName" type="text" name="contactName" value="{{Auth::user()->contactName}}">
                <label for="contactName">Nombre de contacto</label>
            </div>
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5 offset-l1">
                <input id="contactNumber" type="number" name="contactNumber" value="{{Auth::user()->contactNumber}}">
                <label for="contactNumber">N° teléfono de contacto</label>
            </div>
            <div class="input-field col s8 offset-s2 m8 offset-m2 l5 offset-l1">
                <h5>Proporcioná los datos de contacto de una persona de confianza a la que podamos contactar en caso de emergencia.</h5>
            </div>
            <div class="col s10 offset-l1 right-align boton">
                <button class="btn waves-effect waves-light  red darken-2" type="submit">Guardar
                    <i class="material-icons right">send</i>
                </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div id="datos" class="tab-pane fade datos">
      <div class="perfil-caja-titulo">
        <h4>Información verificada</h4>
      </div>
      <div class="datos-titulo">
        <h4>Para reservar o alqulilar un espacio es necesario tener registrado los siguientes datos</h4>
      </div>
      <div class="datos-caja">
        <h3>Direccion de correo electrónico</h3>
        <i class="fa fa-check-circle-o "></i>
        <p>Confirmaste tu dirección de correo electrónico: <strong>{{Auth::user()->email}}</strong> <br> Realizar este paso es importante, ya que nos permite comunicarnos con vos de forma segura.</p>
      </div>
      <div class="datos-caja">
        <h3>Número telefónico</h3>
        @if (!Auth::user()->phoneNumber)
          <i class="fa fa-exclamation-circle"></i>
          @else
            <i class="fa fa-check-circle-o"></i>
        @endif
        <p>Tu número solo se comparte con otros miembros de Estacionados cuando tenés una reservación confirmada con ellos.</p>
      </div>
      <div class="datos-caja">
        <h3>Documento</h3>
        @if (!Auth::user()->DNI)
          <i class="fa fa-exclamation-circle"></i>
          @else
            <i class="fa fa-check-circle-o"></i>
        @endif
        <p class="">No compartiremos tu DNI con otros usuarios de Estacionados. Trabajamos constantemente para que nuestra comunidad sea lo más segura posible para todo el mundo. Por ello, antes de reservar o publicar un espacio, todos los conductores y anfitriones deben añadir una identifiación</p>
      </div>
      <div class="datos-caja">
        <h3>CBU o Alias</h3>
        @if (!Auth::user()->cbu)
          <i class="fa fa-exclamation-circle"></i>
          @else
            <i class="fa fa-check-circle-o"></i>
        @endif
        <p class="last">Proporcioná los datos de tu cbu o Alias para poder recibir las ganancias de tus alquileres. No compartiremos esta infomración con otros usuarios de Estacionados.</p>
      </div>

    </div>

    <div id="creditos" class="tab-pane fade creditos">
      <div class="perfil-caja-titulo">
        <h4>Créditos</h4>
      </div>
      <div class="profile-credit">
        {{-- <img src="images/creditos/credito-img.png"> --}}
        <h4>¡Invitá a tus amigos y obtené créditos para estacionar!</h4>
        <p>Conseguí hasta 50% de descuento en tu próximo alquiler.</p>
          <a href="creditos" class="btn amber">CONSEGUIR CRÉDITO</a>
      </div>
    </div>

    <div id="evaluaciones" class="tab-pane fade evaluaciones">
      <div class="perfil-caja-titulo">
        <h4>Evaluaciones</h4>
      </div>
      <div class="evaluacion-titulo">
        <h4>Las evaluaciones se envían al finalizar una reservación a través de Estacionados. Todas las que recibas estarán disponibles tanto en esta sección como en tu perfil público.</h4>
      </div>
      <div class="evaluacion-caja">
        <div class="usuario-caja">
          <a href="#">
            <div class="chip">
              <img src="/storage/profilePic/{{Auth::user()->profilePic}}" alt="Contact Person">
              <label for="">{{Auth::user()->firstName}}</label>
            </div>
          </a>
        </div>
        <div class="descripcion-caja">
          <p>Fue un placer recibirlos, gracias por su buena predisposicion!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
      <div class="evaluacion-caja">
        <div class="usuario-caja">
          <a href="#">
            <div class="chip">
              <img src="/storage/profilePic/{{Auth::user()->profilePic}}" alt="Contact Person">
              <label for="">{{Auth::user()->firstName}}</label>
            </div>
          </a>
        </div>
        <div class="descripcion-caja">
          <p>El auto perdia aceite, me ensució toda la cochera. Y era un maleducado</p>
        </div>
      </div>
      <div class="evaluacion-caja">
        <div class="usuario-caja">
          <a href="#">
            <div class="chip">
              <img src="/storage/profilePic/{{Auth::user()->profilePic}}" alt="Contact Person">
              <label for="">{{Auth::user()->firstName}}</label>
            </div>
          </a>
        </div>
        <div class="descripcion-caja">
          <p>Todo bien</p>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection

@section('scripts')

  <script src="{{ URL::asset('js/dropzone.js')}}"></script>

  <script>

    const foto = document.getElementById('profilePic');
    const cargarFotoBtn = document.getElementById('cargar-foto-perfil');

    eventListeners();

    function eventListeners(){
      document.addEventListener('DOMContentLoaded', inicioApp);
      foto.addEventListener('blur', validarCampo);
    }

    function inicioApp(){
      // deshabilitar boton
      cargarFotoBtn.disabled = true;
    }

    // Habilitar boton si se selecciona una foto
    function validarCampo(){
      if (this.file != '') {
        cargarFotoBtn.disabled = false;
      }
    }

  </script>

  <script>
      // SELECT DE FORMULARIO
        $(document).ready(function() {
          $('select').material_select();
        });
  </script>

  <script>
        // -----------------------
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 2,

            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {
                    alert("file uploaded");
                });

                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });

                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>

@endsection
