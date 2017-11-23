@extends('layouts.app')
@section('title') Cargar Estacionamiento @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEstacionamiento-progressBar">
        <div class="uploadEstacionamiento-progressBar-progress1"></div>
      </div>

      <h1>Cargar Estacionamiento - Información General</h1>

      <section class="uploadEstacionamiento">

        <div class="form-generico">

          <form action='{{ route('upload.estacionamiento.2') }}' method="post" enctype="multipart/form-data" class="form-uploadEstacionamiento">
            {{ csrf_field() }}

            <label for="" class="upload-label-titulo">¿Donde está ubicado tu espacio?</label>
            <input type="text" placeholder="Domicilio. Ej: Av. Eduardo Madero 399" name="direccion" class="upload-input-direccion" style="" value="">
            <input type="text" placeholder="Nº Dpto. (Opcional)" name="dpto" class="upload-input-numdpto" value="">
            <select name="pais" class="upload-select-pais" style="">
              <option value="">País</option>
              <option value="Argentina">Argentina</option>
            </select>
            <select name="provincia" class="upload-select-provincia" style="">
              <option value="">Provincia</option>
              <option value="BuenosAires">Buenos Aires</option>
              <option value="CABA">Ciudad Autónoma de Buenos Aires</option>
            </select>
            <select name="ciudad" class="upload-select-ciudad" style="">
              <option value="">Ciudad</option>
              <option value="ciudad">ciudad</option>
            </select>
            <input type="text" placeholder="Código Postal" name="codigoPostal" class="upload-input-cp" style="" value="">

            <label for="" class="upload-label-titulo">¿Qué tipo de espacio es?</label>
            <select name="tipoCochera" style="">
              <option value="">Elige una opción</option>
              <option value="cocheraPrivada">Cochera privada</option>
              <option value="playaEstacionamiento">Playa de estacionamiento</option>
            </select>

            <label for="" class="upload-label-titulo">¿Cuántos vehículos se permiten?</label>
            <label for="" class="upload-label-tipovehiculo">Autos</label> <input type="number" placeholder="" name="cantAutos" class="upload-input-tipovehiculo" min="0" max="1" value="">
            <label for="" class="upload-label-tipovehiculo">Motos</label> <input type="number" placeholder="" name="cantMotos" class="upload-input-tipovehiculo" min="0" max="4" value="">
            <label for="" class="upload-label-tipovehiculo">Bicicletas</label> <input type="number" placeholder="" name="cantBicicletas" class="upload-input-tipovehiculo" min="0" max="4" value="">

            <label for="" class="upload-label-titulo">¿Tiene alguno de los siguientes servicios especiales?</label>
            <div class="upload-div-especiales">
              <label for="aptoDiscapacitados" class="upload-label-especiales"><input type="checkbox" name="serviciosEspeciales" value="aptoDiscapacitados" class="upload-checkbox-especiales" id="aptoDiscapacitados">Apto para discapacitados</label>
            </div>
            <div class="upload-div-especiales">
              <label for="uploadElectricos" class="upload-label-especiales"><input type="checkbox" name="serviciosEspeciales" value="uploadElectricos" class="upload-checkbox-especiales" id="uploadElectricos">Carga para autos eléctricos</label>
            </div>

            <label for="" class="upload-label-titulo">Información extra (visible por todos) -opcional-</label>
            <textarea name="name"></textarea>

            <label for="" class="upload-label-titulo">Información extra (únicamente visible por quienes alquilen tu espacio) -opcional-</label>
            <textarea name="name"></textarea>

            <label for="" class="upload-label-titulo">Fotos de tu espacio</label>
            <input type="file" name="profilePic" accept="image/*" style="" multiple>

            <input type="submit" name="boton-submit" value="SIGUIENTE">
          </form>

        </div>

        <div class="upload-div-sideimage"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
