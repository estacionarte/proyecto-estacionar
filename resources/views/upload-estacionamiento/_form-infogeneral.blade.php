<label for="" class="upload-label-titulo">¿Donde está ubicado tu espacio?</label>
<input type="text" placeholder="Domicilio. Ej: Av. Eduardo Madero 399" name="direccion" class="upload-input-direccion" style="" value="{{ old('direccion', $espacio->direccion) }}">
<input type="text" placeholder="Nº Dpto. (Opcional)" name="dpto" class="upload-input-numdpto" value="{{ old('dpto', $espacio->dpto) }}">
<select name="pais" class="upload-select-pais" style="">
  <option value="">País</option>
  <option value="Argentina" {{ old('pais', $espacio->pais) == 'Argentina' ? 'selected':'' }}>Argentina</option>
</select>
<select name="provincia" class="upload-select-provincia" style="">
  <option value="">Provincia</option>
  <option value="Buenos Aires" {{ old('provincia', $espacio->provincia) == 'Buenos Aires' ? 'selected':'' }}>Buenos Aires</option>
  <option value="CABA" {{ old('provincia', $espacio->provincia) == 'CABA' ? 'selected':'' }}>Ciudad Autónoma de Buenos Aires</option>
</select>
<select name="ciudad" class="upload-select-ciudad" style="">
  <option value="">Ciudad</option>
  <option value="ciudad" {{ old('ciudad', $espacio->ciudad) == 'ciudad' ? 'selected':'' }}>ciudad</option>
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
<label for="" class="upload-label-tipovehiculo">Autos</label> <input type="number" placeholder="" name="cantAutos" class="upload-input-tipovehiculo" min="0" max="1" value="{{ old('cantAutos', $espacio->cantAutos) }}">
<label for="" class="upload-label-tipovehiculo">Motos</label> <input type="number" placeholder="" name="cantMotos" class="upload-input-tipovehiculo" min="0" max="4" value="{{ old('cantMotos', $espacio->cantMotos) }}">
<label for="" class="upload-label-tipovehiculo">Bicicletas</label> <input type="number" placeholder="" name="cantBicicletas" class="upload-input-tipovehiculo" min="0" max="4" value="{{ old('cantBicicletas', $espacio->cantBicicletas) }}">

<label for="" class="upload-label-titulo">¿Tiene alguno de los siguientes servicios especiales?</label>
<div class="upload-div-especiales">
  <label for="aptoDiscapacitados" class="upload-label-especiales"><input type="checkbox" name="aptoDiscapacitados" value="Apto para Discapacitados" class="upload-checkbox-especiales" id="aptoDiscapacitados" {{ old('aptoDiscapacitados', $espacio->aptoDiscapacitados) ? 'checked':'' }}>Apto para discapacitados</label>
</div>
<div class="upload-div-especiales">
  <label for="aptoElectricos" class="upload-label-especiales"><input type="checkbox" name="aptoElectricos" value="Apto para Electricos" class="upload-checkbox-especiales" id="uploadElectricos" {{ old('aptoElectricos', $espacio->aptoElectricos) ? 'checked':'' }}>Carga para autos eléctricos</label>
</div>

<label for="" class="upload-label-titulo">Información extra (visible por todos) -opcional-</label>
<textarea name="infopublica" maxlength="250">{{ old('infopublica') }}</textarea>

<label for="" class="upload-label-titulo">Información extra (únicamente visible por quienes alquilen tu espacio) -opcional-</label>
<textarea name="infoprivada" maxlength="250">{{ old('infoprivada') }}</textarea>

<label for="" class="upload-label-titulo">Fotos de tu espacio</label>
<input type="file" name="espacioPic[]" accept="image/*" style="" multiple>
