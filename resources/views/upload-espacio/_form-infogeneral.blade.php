<div class="row">
  <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
    <h3>¿Cómo se va a llamar tu espacio?</h3>
  </div>
  <div class="input-field col s10 offset-s1 m10 offset-m1 l10 offset-l1">
      <input type="text" name="nombre" value="{{ old('nombre', $espacio->nombre) }}">
      <label for="nombre">Ej. Cochera techada</label>
  </div>
  <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
    <h3>¿Donde está ubicado?</h3>
  </div>
  <div class="input-field col s10 offset-s1 m10 offset-m1 l5 offset-l1">
    <select class="icons upload-select-pais" name="pais">
      <option value="" >País</option>
      <option data-icon="/images/icons/argentina.png" value="Argentina" {{ old('pais', $espacio->pais) == 'Argentina' ? 'selected':'' }}  selected>Argentina</option>
    </select>
  </div>
  <div class="input-field col s10 offset-s1 m10 offset-m1 l5 offset-l1">
    <select name="provincia" class="upload-select-provincia">
      <option value="" >Provincia</option>
      <option data-icon="/images/icons/argentina.png" value="Buenos Aires"  {{ old('provincia', $espacio->provincia) == 'Buenos Aires' ? 'selected':'' }}  selected>Buenos Aires</option>
      <option value="CABA" {{ old('provincia', $espacio->provincia) == 'CABA' ? 'selected':'' }}>Ciudad Autónoma de Buenos Aires</option>
    </select>
  </div>
  <div class="input-field col s10 offset-s1 m10 offset-m1 l5 offset-l1">
    <h3>Domicilio. Ej: Av. Eduardo Madero 399</h3>
      <input type="text" name="direccion" class="upload-input-direccion" value="{{ old('direccion', $espacio->direccion) }}" readonly>
      <input type="hidden" name="lat" value="{{ old('lat', $espacio->lat) }}">
      <input type="hidden" name="lng" value="{{ old('lng', $espacio->lng) }}">
      <label for="direccion"></label>
  </div>
  <div class="input-field col s10 offset-s1 m10 offset-m1 l5 offset-l1">
      <input type="text" name="ciudad" class="upload-input-ciudad" value="{{ old('ciudad', $espacio->ciudad) }}" readonly>
      <label for="ciudad">Ciudad</label>
  </div>
  <div class="input-field col s10 offset-s1 m10 offset-m1 l5 offset-l1">
      <input type="text" name="zipcode" class="upload-input-cp"  value="{{ old('zipcode', $espacio->zipcode) }}" readonly>
      <label for="zipcode">Código Postal</label>
  </div>
  <div class="clear"></div>
  <div class="upload-div-map">
      <p id="addresswarning" style="display: none; margin: 5px 0px; color: #990606; font-size: 1em;">Si el mapa se centra en el obelisco y no en el lugar correcto, cambiar ciudad manualmente (por ejemplo: reemplazar Buenos Aires por CABA)</p>
      <p id="mapwarning" style="display: none; margin: 5px 0px 0px; color: gray; font-size: 0.8em;">Esto es lo que verán los usuarios cuando encuentren tu espacio. La dirección exacta sólo se muestra a quienes concreten una reserva.</p>
      <div class="upload-div-div-map1" id="mapid"></div>
  </div>
  <div class="input-field col s10 offset-s1 m10 offset-m1 l5 offset-l1">
    <h3>¿Qué tipo de espacio es?</h3>
    <select name="tipoEspacio">
      <option value="" >Elige una opción</option>
      <option value="Cochera Privada" {{ old('tipoEspacio', $espacio->tipoEspacio) == 'Cochera Privada' ? 'selected':'' }}>Cochera Privada</option>
      <option value="Espacio en Hogar" {{ old('tipoEspacio', $espacio->tipoEspacio) == 'Espacio en Hogar' ? 'selected':'' }}>Espacio en Hogar</option>
      <option value="Playa de Estacionamiento" {{ old('tipoEspacio', $espacio->tipoEspacio) == 'Playa de Estacionamiento' ? 'selected':'' }}>Playa de Estacionamiento</option>
    </select>
  </div>
  <div class="col s10 offset-s1 m10 offset-m1 l5 offset-l1">
    <h3 class="upload-label-titulo">¿Qué vehículos se permiten?</h3>
    <p>
      <input type="checkbox" name="cantAutos" value=1 id="cantAutos" {{ old('cantAutos', $espacio->cantAutos) ? 'checked':'' }} />
      <label for="cantAutos">Autos</label>
    </p>
    <p>
      <input type="checkbox" name="cantMotos" value=1 id="cantMotos" {{ old('cantMotos', $espacio->cantMotos) ? 'checked':'' }} />
      <label for="cantMotos">Motos</label>
    </p>
    <p>
      <input type="checkbox" name="cantBicicletas" value=1 id="cantBicicletas" {{ old('cantBicicletas', $espacio->cantBicicletas) ? 'checked':'' }} />
      <label for="cantBicicletas">Bicicletas</label>
    </p>
  </div>
  <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
    <h3 class="upload-label-titulo">¿Tiene alguno de los siguientes servicios especiales?</h3>
    <p>
      <input type="checkbox" name="aptoDiscapacitados" value="Apto para Discapacitados" id="aptoDiscapacitados" {{ old('aptoDiscapacitados', $espacio->aptoDiscapacitados) ? 'checked':'' }} />
      <label for="aptoDiscapacitados">Apto para discapacitados</label>
    </p>
    <p>
      <input type="checkbox" name="aptoElectricos" value="Apto para Electricos" id="aptoElectricos" {{ old('aptoElectricos', $espacio->aptoElectricos) ? 'checked':'' }} />
      <label for="aptoElectricos">Carga para vehículos eléctricos</label>
    </p>
  </div>
  <div class="col s10 offset-s1 m10 offset-m1">
    <h3>Información extra (visible por todos)</h3>
  </div>
  <div class="input-field col s10 offset-s1 m10 offset-m1">
    <textarea name="infopublica" maxlength="250" id="textarea1" class="materialize-textarea">{{ old('infopublica', $espacio->infopublica) }}</textarea>
    <label for="textarea1">Por ejemplo: edificio de departamentos, fácil acceso desde calle, no se necesita bajar a abrir...</label>
  </div>
  <div class="col s10 offset-s1 m10 offset-m1">
    <h3>Información extra (únicamente visible por quienes alquilen tu espacio) -opcional-</h3>
  </div>
  <div class="input-field col s10 offset-s1 m10 offset-m1">
    <textarea name="infoprivada" maxlength="250" id="textarea2" class="materialize-textarea">{{ old('infoprivada', $espacio->infoprivada) }}</textarea>
    <label for="textarea2">Por ejemplo: tocar timbre de departamento 3B al llegar, usar cochera número 15... No incluir teléfono ni e-mail por razones de seguridad</label>
  </div>
  <div class="file-field input-field col s10 offset-s1 m10 offset-m1">
    <h3>Fotos de tu espacio</h3>
      <div class="btn">
        <span>Cargar</span>
        <input type="file" name="espacioPic[]" accept="image/*" style="" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <div class="col s10 offset-s1 m10 offset-m1">
      <p id="photowarning" style="margin: 5px 0px 0px; color: #990606; font-size: 0.6em;">Si no subís fotos, podés seguir con el proceso pero tu espacio no va a estar disponible para alquilar hasta que tenga por lo menos una foto</p>
    </div>
