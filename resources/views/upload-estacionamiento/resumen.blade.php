@extends('layouts.app')
@section('title') Cargar Estacionamiento @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEstacionamiento-progressBar">
        <div class="uploadEstacionamiento-progressBar-progress5"></div>
      </div>

      <h1>Confirmar Datos</h1>

      <section class="uploadEstacionamiento">

        <section class="upload-seccion-resumen">
          <h2>Información General</h2>
          <p>Av. Eduardo Madero 399</p>
          <p>Ciudad Autónoma de Buenos Aires, C.A.B.A., Argentina, 1001</p>
          <br>
          <p>Cochera Privada</p>
          <br>
          <p>Autos: 1</p>
          <p>Motos: 2</p>
          <p>Bicicletas: 2</p>
          <br>
          <p>NO apto para discapacitados</p>
          <p>NO carga autos eléctricos</p>
          <br>
          <p>Cochera dentro de un edificio.</p>
          <p>Entrar por el portón de rejas negras con una luz verde.</p>
          <br>
          <p>3 fotos.</p>
        </section>

        <div class="upload-div-sideimage4"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
