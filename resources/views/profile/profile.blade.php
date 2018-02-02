@extends('layouts.app')
@section('title') Mi Perfil @endsection
@section('css')
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')

@include('profile.nav-bar-profile')

<div class="profile-container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#profile"><i class="fa fa-info-circle"></i> <label id="infper">Información personal</label></a></li>
    <li><a data-toggle="tab" href="#img-profile"><i class="fa fa-user-circle"></i><label>Imagen de perfil</label></a></li>
    <li><a data-toggle="tab" href="#datos"><i class="fa fa-check-circle"></i><label>Datos verificados</label></a></li>
    <li><a data-toggle="tab" href="#creditos"><i class="fa fa-gift"></i><label>Obtener Créditos</label></a></li>
    <li><a data-toggle="tab" href="#referencias"><i class="fa fa-handshake-o"></i><label>Referencias</label></a></li>
  </ul>

  <div class="tab-content">
    <div id="profile" class="tab-pane fade in active">
      <div class="titulo">
        <h4>Campos requeridos para alquilar o reservar un espacio</h4>
        <form class="form-horizontal" action="/action_page.php">
          <div class="form-group">
            <label class="control-label col-xs-2 col-sm-2" for="nombre">Nombre:</label>
            <div class="col-xs-8 col-sm-7">
              <input type="text" class="form-control" id="nombre" value="{{Auth::user()->firstName}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2 col-sm-2" for="apellido">Apellido:</label>
            <div class="col-xs-8 col-sm-7">
              <input type="text" class="form-control" id="apellido" value="{{Auth::user()->lastName}}">
              <h5>Solo se mostrará tu nombre de pila en tu perfil público. Cuando hagas una solicitud de reservación, el anfitrión podrá ver tu nombre y apellido</h5>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2 col-sm-2" for="pais">País:</label>
          <div class="col-xs-8 col-sm-4">
            <select class="form-control" id="pais">
              <option selected>Seleccionar</option>
              <option value={{Auth::user()->country}}>Argentina</option>
            </select>
          </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2 col-sm-2" for="genero">Soy:</label>
          <div class="col-xs-8 col-sm-4">
            <select class="form-control" id="genero">
              <option selected>Género</option>
              <option>Hombre</option>
              <option>Mujer</option>
              <option>Otro</option>
            </select>
          </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2 col-sm-2" for="dia">Fecha de nacimiento:</label>
            <div class="col-xs-3 col-sm-2">
              <input type="text" class="form-control" id="dia" value="{{$dia}}">
            </div>
            <div class="col-xs-3 col-sm-2 profile-mes">
              <input type="number" class="form-control" id="mes" value="{{$mes}}">
            </div>
            <div class="col-xs-3 col-sm-2 profile-mes">
              <input type="number" class="form-control" id="anio" value="{{$anio}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2 col-sm-2" for="dni">DNI:</label>
            <div class="col-xs-8 col-sm-4">
              <input type="text" class="form-control" id="dni" value="{{Auth::user()->DNI}}">
              <h5 style="display:inline">No compartiremos tu DNI con otros usuarios de Estacionados.</h5><a data-toggle="tab" href="#datos"> Más información</a>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2 col-sm-2" for="email">Email:</label>
            <div class="col-xs-8 col-sm-7">
              <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}">
              <h5>No compartiremos tu dirección de correo electrónico personal con otros usuarios de Estacionados.</h5>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2 col-sm-2" for="phone">Telefono:</label>
            <div class="col-xs-8 col-sm-7">
              <input type="number" class="form-control" id="phone" value="{{Auth::user()->phoneNumber}}">
              <h5>Tu número solo se compartirá cuando tengas una reservación confirmada con otro usuario de Estacionados. Es el método que utilizamos para ponernos en contacto vos.</h5>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2 col-sm-2" for="phone2">Contacto:</label>
            <div class="col-xs-8 col-sm-7">
              <input type="text" class="form-control" id="phone2" placeholder="Nombre" value="{{Auth::user()->nombre2}}">
              <input type="number" class="form-control" id="phone2" placeholder="Teléfono" style="margin-top:5px" value="{{Auth::user()->phoneNumber2}}">
              <h5>Proporcioná los datos de contacto de una persona de confianza a la que podamos contactar en caso de emergencia.</h5>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2  col-sm-10">
              <button type="submit" class="btn btn-danger">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div id="img-profile" class="tab-pane fade">
      <h4>Imagen de perfil</h4>
      <div class="img-profile-container">
        <img src="storage/profilePic/{{Auth::user()->profilePic}}" alt="profile image">
      </div>
      <div class="txt-img-profile">
        <p>Para que los conductores y anfitriones se conozcan, lo mejor es añadir fotos de la cara que sean nítidas y estén sacadas de frente. Asegurate de utilizar una foto en la que se te vea bien la cara y que no incluya información personal o sensible que preferirías que los conductores o anfitriones no viera</p>
      </div>
      <div class="btn-img-profile">

        <form method="post" enctype="multipart/form-data" action="{{ route ('profile')}}">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <input type="file" name="profilePic" accept="image/*" style="{{ $errors->has('profilePic') ? ' border: solid 2px #990606' : '' }}">
          <input type="submit" name="boton-submit" value="subir imagen">
          {{-- <a href="" type="submit">Subir una foto</a> --}}
        </form>
      </div>
    </div>


    <div id="datos" class="tab-pane fade datos">
      <h4>Información verificada</h4>
      <div class="">
        <h3>Direccion de correo electrónico</h3>
        <i class="fa fa-check-circle-o "></i>
        <p>Confirmaste tu dirección de correo electrónico: <strong>{{Auth::user()->email}}</strong> <br> Realizar este paso es importante, ya que nos permite comunicarnos con vos de forma segura.</p>
      </div>
      <div class="">
        <h3>Número telefónico</h3>
        @if (!Auth::user()->phoneNumber)
          <i class="fa fa-exclamation-circle"></i>
          @else
            <i class="fa fa-check-circle-o"></i>
        @endif
        <p>Tu número solo se comparte con otros miembros de Estacionados cuando tenés una reservación confirmada con ellos.</p>
      </div>
      <div class="">
        <h3>Documento</h3>
        @if (!Auth::user()->DNI)
          <i class="fa fa-exclamation-circle"></i>
          @else
            <i class="fa fa-check-circle-o"></i>
        @endif
        <p class="last">No compartiremos tu DNI con otros usuarios de Estacionados. Trabajamos constantemente para que nuestra comunidad sea lo más segura posible para todo el mundo. Por ello, antes de reservar o publicar un espacio, todos los conductores y anfitriones deben añadir una identifiación</p>
      </div>

    </div>


    <div id="creditos" class="tab-pane fade creditos">
      <h4>Créditos</h4>
      <div class="profile-credit">
        {{-- <img src="images/creditos/credito-img.png"> --}}
        <h3>¡Invitá a tus amigos y obtené créditos para estacionar!</h3>
        <p>Conseguí hasta 50% de descuento en tu próximo alquiler.</p>
        <div class="btn btn-warning">
          <a href="credits.php">CONSEGUIR CRÉDITO</a>
        </div>
      </div>
    </div>


    <div id="referencias" class="tab-pane fade">
      <h4>Referencias</h4>
      <p>aca van comentarios de otros usuarios sobre vos. esto es visible para todos</p>
    </div>

  </div>
</div>

@endsection

@section('scripts')

  <script src="{{ URL::asset('js/dropzone.js')}}"></script>

  <script>
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
