<label for="" class="upload-label-titulo">¿Donde está ubicado tu espacio?</label>
<input type="text" placeholder="Domicilio. Ej: Av. Eduardo Madero 399" name="direccion" class="upload-input-direccion" style="" value="{{ old('direccion', $espacio->direccion) }}" id="pac-input">
<input type="text" placeholder="Nº Dpto. (Opcional)" name="dpto" class="upload-input-numdpto" value="{{ old('dpto', $espacio->dpto) }}">

<select name="pais" class="upload-select-pais" style="">
  <option value="">País</option>
  {{-- <option value="Argentina" {{ old('pais', $espacio->pais) == 'Argentina' ? 'selected':'' }}>Argentina</option> --}}
</select>

<select name="provincia" class="upload-select-provincia" style="">
  <option value="">Provincia</option>
  {{-- <option value="Buenos Aires" {{ old('provincia', $espacio->provincia) == 'Buenos Aires' ? 'selected':'' }}>Buenos Aires</option> --}}
  {{-- <option value="CABA" {{ old('provincia', $espacio->provincia) == 'CABA' ? 'selected':'' }}>Ciudad Autónoma de Buenos Aires</option> --}}
</select>
<select name="ciudad" class="upload-select-ciudad" style="">
  <option value="">Ciudad</option>
  <option value="CABA" {{ old('ciudad', $espacio->ciudad) == 'CABA' ? 'selected':'' }}>C.A.B.A.</option>
</select>
<input type="text" placeholder="Código Postal" name="zipcode" class="upload-input-cp" style="" value="{{ old('zipcode', $espacio->zipcode) }}">

<label for="" class="upload-label-titulo">¿Qué tipo de espacio es?</label>
<select name="tipoEspacio" style="">
  <option value="">Elige una opción</option>
  <option value="Cochera Privada" {{ old('tipoEspacio', $espacio->tipoEspacio) == 'Cochera Privada' ? 'selected':'' }}>Cochera privada</option>
  <option value="Espacio en Hogar" {{ old('tipoEspacio', $espacio->tipoEspacio) == 'Espacio en Hogar' ? 'selected':'' }}>Espacio en hogar</option>
  <option value="Playa de Estacionamiento" {{ old('tipoEspacio', $espacio->tipoEspacio) == 'Playa de Estacionamiento' ? 'selected':'' }}>Playa de estacionamiento</option>
</select>

<label for="" class="upload-label-titulo">¿Cuántos vehículos se permiten?</label>

<div class="upload-div-tipovehiculo">
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
</div>

<label for="" class="upload-label-titulo">¿Tiene alguno de los siguientes servicios especiales?</label>
<div class="upload-div-especiales">
  <label for="aptoDiscapacitados" class="upload-label-especiales"><input type="checkbox" name="aptoDiscapacitados" value="Apto para Discapacitados" class="upload-checkbox-especiales" id="aptoDiscapacitados" {{ old('aptoDiscapacitados', $espacio->aptoDiscapacitados) ? 'checked':'' }}>Apto para discapacitados</label>
</div>
<div class="upload-div-especiales">
  <label for="aptoElectricos" class="upload-label-especiales"><input type="checkbox" name="aptoElectricos" value="Apto para Electricos" class="upload-checkbox-especiales" id="aptoElectricos" {{ old('aptoElectricos', $espacio->aptoElectricos) ? 'checked':'' }}>Carga para autos eléctricos</label>
</div>

<label for="" class="upload-label-titulo">Información extra (visible por todos) -opcional-</label>
<textarea name="infopublica" maxlength="250" placeholder="Por ejemplo: edificio de departamentos, fácil acceso desde calle, no se necesita bajar a abrir...">{{ old('infopublica', $espacio->infopublica) }}</textarea>

<label for="" class="upload-label-titulo">Información extra (únicamente visible por quienes alquilen tu espacio) -opcional-</label>
<textarea name="infoprivada" maxlength="250" placeholder="Por ejemplo: tocar timbre de departamento 3B al llegar, usar cochera número 15... No incluir teléfono ni e-mail por razones de seguridad">{{ old('infoprivada', $espacio->infoprivada) }}</textarea>

<label for="" class="upload-label-titulo">Fotos de tu espacio</label>
<input type="file" name="espacioPic[]" accept="image/*" style="" multiple>
