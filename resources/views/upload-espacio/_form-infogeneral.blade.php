<label for="" class="upload-label-titulo">¿Cómo se va a llamar tu espacio?</label>
<div class="upload-div-nombre">
  <input type="text" placeholder="Ejemplo: Cochera techada en Núñez" name="nombre" class="upload-input-nombre" style="" value="{{ old('nombre', $espacio->nombre) }}" required>
</div>

<label for="" class="upload-label-titulo">¿Donde está ubicado tu espacio?</label>

<div class="upload-div-fulladdress">

  <div class="upload-div-paisprovincia">
    <select name="pais" class="upload-select-pais" style="" required>
      <option value="">País</option>
      <option value="Argentina" {{ old('pais', $espacio->pais) == 'Argentina' ? 'selected':'' }}>Argentina</option>
    </select>

    <select name="provincia" class="upload-select-provincia" style="" required>
      <option value="">Provincia</option>
      <option value="Buenos Aires" {{ old('provincia', $espacio->provincia) == 'Buenos Aires' ? 'selected':'' }}>Buenos Aires</option>
      <option value="CABA" {{ old('provincia', $espacio->provincia) == 'CABA' ? 'selected':'' }}>Ciudad Autónoma de Buenos Aires</option>
    </select>
  </div>

  <div class="upload-div-domicilio">
    <input type="text" placeholder="Domicilio. Ej: Av. Eduardo Madero 399" name="direccion" class="upload-input-direccion" style="" value="{{ old('direccion', $espacio->direccion) }}" readonly required>
    <input type="hidden" name="lat" value="{{ old('lat', $espacio->lat) }}">
    <input type="hidden" name="lng" value="{{ old('lng', $espacio->lng) }}">
  </div>

  <div class="upload-div-ciudadzipcode">
    <input type="text" placeholder="Ciudad" name="ciudad" class="upload-input-ciudad" style="" value="{{ old('ciudad', $espacio->ciudad) }}" readonly required>

    <input type="text" placeholder="Código Postal" name="zipcode" class="upload-input-cp" style="" value="{{ old('zipcode', $espacio->zipcode) }}" readonly required>
  </div>

</div>

<div class="upload-div-map">
  <p id="addresswarning" style="display: none; margin: 5px 0px; color: #990606; font-size: 1em;">Si el mapa se centra en el obelisco y no en el lugar correcto, cambiar ciudad manualmente</p>
  <p id="mapwarning" style="display: none; margin: 5px 0px 0px; color: gray; font-size: 0.8em;">Esto es lo que verán los usuarios cuando encuentren tu espacio. La dirección exacta sólo se muestra a quienes concreten una reserva.</p>
  <div class="upload-div-div-map1" id="mapid">
</div>

</div>

<label for="" class="upload-label-titulo">¿Qué tipo de espacio es?</label>
<select name="tipoEspacio" style="" required>
  <option value="">Elige una opción</option>
  <option value="Cochera Privada" {{ old('tipoEspacio', $espacio->tipoEspacio) == 'Cochera Privada' ? 'selected':'' }}>Cochera privada</option>
  <option value="Espacio en Hogar" {{ old('tipoEspacio', $espacio->tipoEspacio) == 'Espacio en Hogar' ? 'selected':'' }}>Espacio en hogar</option>
  <option value="Playa de Estacionamiento" {{ old('tipoEspacio', $espacio->tipoEspacio) == 'Playa de Estacionamiento' ? 'selected':'' }}>Playa de estacionamiento</option>
</select>

<label for="" class="upload-label-titulo">¿Qué vehículos se permiten?</label>

<div class="upload-div-tipovehiculo">
  <label for="cantAutos" class="upload-label-checkbox">Autos
    <input type="checkbox" name="cantAutos" value=1 class="upload-input-checkbox" id="cantAutos" {{ old('cantAutos', $espacio->cantAutos) ? 'checked':'' }}>
    <span class="upload-span-checkbox"></span>
  </label>
</div>

<div class="upload-div-tipovehiculo">
  <label for="cantMotos" class="upload-label-checkbox">Motos
    <input type="checkbox" name="cantMotos" value=1 class="upload-input-checkbox" id="cantMotos" {{ old('cantMotos', $espacio->cantMotos) ? 'checked':'' }}>
    <span class="upload-span-checkbox"></span>
  </label>
</div>

<div class="upload-div-tipovehiculo">
  <label for="cantBicicletas" class="upload-label-checkbox">Bicicletas
    <input type="checkbox" name="cantBicicletas" value=1 class="upload-input-checkbox" id="cantBicicletas" {{ old('cantBicicletas', $espacio->cantBicicletas) ? 'checked':'' }}>
    <span class="upload-span-checkbox"></span>
  </label>
</div>

{{-- <div class="upload-div-tipovehiculo">
  <label class="upload-label-tipovehiculo">Autos</label>
  <div class="upload-div-div-tipovehiculo">
    <button type="button" name="boton-resta-auto" class="upload-button-sumaresta">
      <i class="fa fa-minus-circle"></i>
    </button>
    <input type="text" placeholder="0" name="cantAutos" class="upload-input-tipovehiculo" value="{{ old('cantAutos', $espacio->cantAutos) }}">
    <button type="button" name="boton-suma-auto" class="upload-button-sumaresta">
      <i class="fa fa-plus-circle"></i>
    </button>
  </div>
</div>

<div class="upload-div-tipovehiculo">
  <label class="upload-label-tipovehiculo">Motos</label>
  <div class="upload-div-div-tipovehiculo">
    <button type="button" name="boton-resta-moto" class="upload-button-sumaresta">
      <i class="fa fa-minus-circle"></i>
    </button>
    <input type="text" placeholder="0" name="cantMotos" class="upload-input-tipovehiculo" value="{{ old('cantMotos', $espacio->cantMotos) }}">
    <button type="button" name="boton-suma-moto" class="upload-button-sumaresta">
      <i class="fa fa-plus-circle"></i>
    </button>
  </div>
</div>

<div class="upload-div-tipovehiculo">
  <label class="upload-label-tipovehiculo">Bicicletas</label>
  <div class="upload-div-div-tipovehiculo">
    <button type="button" name="boton-resta-bici" class="upload-button-sumaresta">
      <i class="fa fa-minus-circle"></i>
    </button>
    <input type="text" placeholder="0" name="cantBicicletas" class="upload-input-tipovehiculo" value="{{ old('cantBicicletas', $espacio->cantBicicletas) }}">
    <button type="button" name="boton-suma-bici" class="upload-button-sumaresta">
      <i class="fa fa-plus-circle"></i>
    </button>
  </div>
</div> --}}

<label for="" class="upload-label-titulo">¿Tiene alguno de los siguientes servicios especiales?</label>

<div class="upload-div-especiales">
  <label for="aptoDiscapacitados" class="upload-label-checkbox">Apto para discapacitados
    <input type="checkbox" name="aptoDiscapacitados" value="Apto para Discapacitados" class="upload-input-checkbox" id="aptoDiscapacitados" {{ old('aptoDiscapacitados', $espacio->aptoDiscapacitados) ? 'checked':'' }}>
    <span class="upload-span-checkbox"></span>
  </label>
</div>
<div class="upload-div-especiales">
  <label for="aptoElectricos" class="upload-label-checkbox">Carga para vehículos eléctricos
    <input type="checkbox" name="aptoElectricos" value="Apto para Electricos" class="upload-input-checkbox" id="aptoElectricos" {{ old('aptoElectricos', $espacio->aptoElectricos) ? 'checked':'' }}>
    <span class="upload-span-checkbox"></span>
  </label>
</div>

<label for="" class="upload-label-titulo">Información extra (visible por todos)</label>
<textarea name="infopublica" maxlength="250" placeholder="Por ejemplo: edificio de departamentos, fácil acceso desde calle, no se necesita bajar a abrir..." required>{{ old('infopublica', $espacio->infopublica) }}</textarea>

<label for="" class="upload-label-titulo">Información extra (únicamente visible por quienes alquilen tu espacio) -opcional-</label>
<textarea name="infoprivada" maxlength="250" placeholder="Por ejemplo: tocar timbre de departamento 3B al llegar, usar cochera número 15... No incluir teléfono ni e-mail por razones de seguridad">{{ old('infoprivada', $espacio->infoprivada) }}</textarea>

<label for="" class="upload-label-titulo">Fotos de tu espacio</label>
<input type="file" name="espacioPic[]" accept="image/*" style="" multiple>
<p id="photowarning" style="margin: 5px 0px 0px; color: #990606; font-size: 0.9em;">Si no subís fotos, podés seguir con el proceso pero tu espacio no va a estar disponible para alquilar hasta que tenga por lo menos una foto</p>
