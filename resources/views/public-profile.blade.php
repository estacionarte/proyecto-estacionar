@extends('layouts.app')
@section('title')Perfil público @endsection
@section('content')
  @php
  // me traigo la fecha de la DB
  $fecha = DB::table('users')
  ->select('created_at')
  ->where([
    ['id', '=', Auth::user()->id],
    ['created_at', '=', Auth::user()->created_at]
  ])
  ->first();

  // separo la fecha para poder mostrarla por separado
  $toArray = (array)$fecha;
  $toString = implode('-', $toArray);

  $diaMesAnio = explode('-', $toString);
  $anio = $diaMesAnio[0];
  $mes = $diaMesAnio[1];
  $dia = $diaMesAnio[2];

  @endphp

<div class="perfil-publico">
  <div class="bodies-main-content">
    <div class="gral-main">
      <h1>¡Perfil público de {{Auth::user()->firstName}}!</h1>
      <div class="info-izq">
        <div class="img-profile">
          <img class="image" for="file-path" src="storage/profilePic/{{Auth::user()->profilePic}}" alt="profile image">
        </div>
        <div class="info-verificada">
          <div class="perfil-caja-titulo">
            <h4>Información verificada</h4>
          </div>
          <div class="datos-caja">
            <h5>Direccion de <br>correo electrónico</h5>
            <i class="fa fa-check-circle-o "></i>
          </div>
          <div class="datos-caja">
            <h5>Número telefónico</h5>
            @if (!Auth::user()->phoneNumber)
              <i class="fa fa-exclamation-circle"></i>
              @else
                <i class="fa fa-check-circle-o"></i>
            @endif
          </div>
          <div class="datos-caja">
            <h5>Documento</h5>
            @if (!Auth::user()->DNI)
              <i class="fa fa-exclamation-circle"></i>
              @else
                <i class="fa fa-check-circle-o"></i>
            @endif
          </div>
        </div>
      </div>

        <div class="info-derecha">
          <h4 class="barrio">Vive en el barrio de .... agregar columna barrio</h4>
          <h3>Se registró en @php
          switch ($mes) {
              case "01":
                  echo "Enero";
                  break;
              case "02":
                  echo "Febrero";
                  break;
              case "03":
                  echo "Marzo";
                  break;
              case "04":
                  echo "Abril";
                  break;
              case "05":
                  echo "Mayo";
                  break;
              case "06":
                  echo "junio";
                  break;
              case "07":
                  echo "Julio";
                  break;
              case "08":
                  echo "Agosto";
                  break;
              case "09":
                  echo "Septiembre";
                  break;
              case "10":
                  echo "Octubre";
                  break;
              case "11":
                  echo "Noviembre";
                  break;
              case "12":
                  echo "Diciembre";
                  break;
              default:
                  echo "";
          }
          @endphp de {{$anio}}</h3>
          <a href="/reportar-usuario"><img class="flag" src="images/icons/flag.png" alt="denunciar usuario">Reportar usuario</a>
          <div class="evaluaciones">
            <div class="titulo">
              <h4>Evauaciones sobre {{Auth::user()->firstName}}</h4>
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
        </div>
    </div>
  </div>
</div>

@endsection
