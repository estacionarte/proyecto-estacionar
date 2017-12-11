@extends('layouts.app')
@section('title') Signup @endsection
@section('signup')

<div class="container">

  <div class="bodies-main-content">

    <hr>

    <h1>Crear Cuenta Nueva</h1>

    <section class="signup">

      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
          <p style="color: #990606;"> {{ $error }} </p>
        @endforeach
      @endif

      <div class="form-generico">

        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <input type="text" placeholder="Nombre" name="firstName" class="form-firstname" style="{{ $errors->has('firstName') ? ' border: solid 2px #990606' : '' }}" value="{{ old('firstName') }}"  autofocus>

          <input type="text" placeholder="Apellido" name="lastName" class="form-lastname" style="{{ $errors->has('lastName') ? ' border: solid 2px #990606' : '' }}" value="{{ old('lastName') }}" >

          <!-- <label for="" class="form-birthdate-label">Fecha de Nacimiento:</label> -->

          <input type="number" placeholder="dd" name="birthDay" min="1" max="31" class="form-birthdate" style="{{ $errors->has('birthDay') ? ' border: solid 2px #990606' : '' }}" value="{{ old('birthDay') }}" >

          <input type="number" placeholder="mm" name="birthMonth" min="1" max="12" class="form-birthdate" style="{{ $errors->has('birthMonth') ? ' border: solid 2px #990606' : '' }}" value="{{ old('birthMonth') }}" >

          <input type="number" placeholder="aaaa" name="birthYear" min="1900" max="2010" class="form-birthdate" style="{{ $errors->has('birthYear') ? ' border: solid 2px #990606' : '' }}" value="{{ old('birthYear') }}" >



          <input type="email" placeholder="E-Mail" name="email" style="{{ $errors->has('email') ? ' border: solid 2px #990606' : '' }}" value="{{ old('email') }}" >

      		<select id="comboPaises">
      		</select>

      		<select id="comboProvincia" style="display:none">
      		</select>

          <!-- <input type="tel" placeholder="Teléfono Móvil" name="telefono" style="" value="<?php echo (isset($_COOKIE['telefono']) && !empty($_COOKIE['telefono'])) ? $_COOKIE['telefono'] : ""; ?>"> -->

          <input type="password" placeholder="Contraseña" name="password" style="{{ $errors->has('password') ? ' border: solid 2px #990606' : '' }}" >

          <input type="password" placeholder="Confirmar Contraseña" name="password_confirmation" style="{{ $errors->has('password_confirmation') ? ' border: solid 2px #990606' : '' }}" >

          <!-- <?php $tipo = isset( $_COOKIE['interes']) ? $_COOKIE['interes'] : ''; ?>

          <select name="interes" style="">
            <option value="">Interés Principal</option>
            <option value="locatario" <?php echo $tipo=='locatario'?$s:''; ?>>Buscar estacionamiento</option>
            <option value="propietario" <?php echo $tipo=='propietario'?$s:''; ?>>Ofrecer estacionamiento</option>
            <option value="ambos" <?php echo $tipo=='ambos'?$s:''; ?>>Ambos</option>
          </select> -->

          @if ($errors->has('profilePic'))
                  <p style='color:#990606'>{{ $errors->first('profilePic') }}</p>
          @endif
          <input type="file" name="profilePic" accept="image/*" style="{{ $errors->has('profilePic') ? ' border: solid 2px #990606' : '' }}">

          <input type="submit" name="boton-submit" value="CREAR CUENTA">
        </form>

      </div>

      <p>Al hacer click en "Crear Cuenta", aceptas los términos y condiciones y la política de privacidad de EstacionARte.</p>

      <a href="signin.php">¿Ya estás registrado?</a>

      <div class="login-separador">
        <span>O</span>
      </div>

      <a href="#" class="facebook-login-button">Crear Cuenta con Facebook</a>
      <a href="#" class="google-login-button">Crear Cuenta con Google</a>

    </section>
  </div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/menu.js"></script>
<script type="text/javascript">

  window.onload = function(){

    ajaxCall('GET','http://pilote.techo.org/?do=api.getPaises',llenarSelectPaises);

    var combopaises = document.querySelector("comboPaises");
    combopaises.addEventListener("change",cambioPaisSeleccionado);
  }

  function cambioPaisSeleccionado(){

  		ajaxCall('GET','http://pilote.techo.org/?do=api.getRegiones?idPais=' + this.value ,llenarSelectProvincias);
  }

  function llenarSelectPaises(resultado){
  		llenarSelect("comboPaises",resultado.contenido);
  }

  function llenarSelectProvincias(resultado){
  		llenarSelect("comboProvincia",resultado.contenido);
  }

  function llenarSelect (selectId, objetoResultado){
  	var select = document.getElementById(selectId);

  	var option = document.createElement("OPTION");
  	option.value = -1;
  	option.text = 'País';

  	select.appendChild(option);

  	for (var x in objetoResultado) {

      	var option = document.createElement("OPTION");
  			option.value = objetoResultado[x];
  			option.text = x;

  			select.appendChild(option);
  	}

  }

  function ajaxCall (method,url,callbackFunction){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          var objetoResultado = JSON.parse(xmlhttp.responseText);
          callbackFunction(objetoResultado);
      }
    };

    if(method == "POST")
      xmlhttp.setRequestHeader("Contenttype", "application/xwwwformurlencoded");

    xmlhttp.open(method, url, true);
    xmlhttp.send();

  }

  // function mostrarProvincias() {
  //   var paises = document.getElementById("comoboPaises").value;
  //   if (mostrar == -1 || mostrar == 'Bicicleta') {
  //     document.getElementById("vehiculo-marca").disabled = true;
  //   }else {
  //     document.getElementById("vehiculo-marca").disabled = false;
  //   }
  // }
  var paises  = document.getElementById('comoboPaises');
  paises.onchange = function (event){
      event.preventDefault();
      document.getElementById('comboProvincia').style.display = 'block';
      // document.getElementById('segundaParte').style.display = 'block';
  }

</script>
@endsection
