<div class="form-group col-xs-5 col-sm-4 col-md-5">

  <select id="vehiculo" class="form-control" name="tipoVehiculo" onchange="mostrarMarca()">
    <option value="-1" {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == '-1' ? 'selected':'' }}>Tipo de vehiculo</option>
    <option value="Automovil"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Automovil' ? 'selected':'' }}>AUTOMOVIL</option>
    <option value="Camion"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Camion' ? 'selected':'' }}>CAMIÓN</option>
    <option value="Camioneta"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Camioneta' ? 'selected':'' }}>CAMIONETA</option>
    <option value="Motocicleta"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Motocicleta' ? 'selected':'' }}>MOTOCICLETA</option>
    <option value="Bicicleta"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Bicicleta' ? 'selected':'' }}>BICICLETA</option>
  </select><br>

  <select id="vehiculo-marca" class="form-control" name="marca">
    <option value="" {{ old('marca', $vehiculo->marca) == '' ? 'selected':'' }}selected>Marca</option>
    <option value="ABARTH" {{ old('marca', $vehiculo->marca) == 'ABARTH' ? 'selected':'' }}>ABARTH</option>
    <option value="ALFA ROMEO" {{ old('marca', $vehiculo->marca) == 'ALFA ROMEO' ? 'selected':'' }}>ALFA ROMEO</option>
    <option value="ASTON MARTIN" {{ old('marca', $vehiculo->marca) == 'ASTON MARTIN' ? 'selected':'' }}>ASTON MARTIN</option>
    <option value="AUDI" {{ old('marca', $vehiculo->marca) == 'AUDI' ? 'selected':'' }}>AUDI</option>
    <option value="BENTLEY" {{ old('marca', $vehiculo->marca) == 'BENTLEY' ? 'selected':'' }}>BENTLEY</option>
    <option value="BMW" {{ old('marca', $vehiculo->marca) == 'BMW' ? 'selected':'' }}>BMW</option>
    <option value="BYD" {{ old('marca', $vehiculo->marca) == 'BYD' ? 'selected':'' }}>BYD</option>
    <option value="CHEVROLET" {{ old('marca', $vehiculo->marca) == 'CHEVROLET' ? 'selected':'' }}>CHEVROLET</option>
    <option value="CITROEN" {{ old('marca', $vehiculo->marca) == 'CITROEN' ? 'selected':'' }}>CITROEN</option>
    <option value="DACIA" {{ old('marca', $vehiculo->marca) == 'DACIA' ? 'selected':'' }}>DACIA</option>
    <option value="FERRARI" {{ old('marca', $vehiculo->marca) == 'FERRARI' ? 'selected':'' }}>FERRARI</option>
    <option value="FIAT" {{ old('marca', $vehiculo->marca) == 'FIAT' ? 'selected':'' }}>FIAT</option>
    <option value="FORD" {{ old('marca', $vehiculo->marca) == 'FORD' ? 'selected':'' }}>FORD</option>
    <option value="HONDA" {{ old('marca', $vehiculo->marca) == 'HONDA' ? 'selected':'' }}>HONDA</option>
    <option value="HYUNDAI" {{ old('marca', $vehiculo->marca) == 'HYUNDAI' ? 'selected':'' }}>HYUNDAI</option>
    <option value="INFINITI" {{ old('marca', $vehiculo->marca) == 'INFINITI' ? 'selected':'' }}>INFINITI</option>
    <option value="ISUZU" {{ old('marca', $vehiculo->marca) == 'ISUZU' ? 'selected':'' }}>ISUZU</option>
    <option value="JAGUAR" {{ old('marca', $vehiculo->marca) == 'JAGUAR' ? 'selected':'' }}>JAGUAR</option>
    <option value="JEEP" {{ old('marca', $vehiculo->marca) == 'JEEP' ? 'selected':'' }}>JEEP</option>
    <option value="KIA" {{ old('marca', $vehiculo->marca) == 'KIA' ? 'selected':'' }}>KIA</option>
    <option value="LADA" {{ old('marca', $vehiculo->marca) == 'LADA' ? 'selected':'' }}>LADA</option>
    <option value="LAMBORGHINI" {{ old('marca', $vehiculo->marca) == 'LAMBORGHINI' ? 'selected':'' }}>LAMBORGHINI</option>
    <option value="LAND ROVER" {{ old('marca', $vehiculo->marca) == 'LAND ROVER' ? 'selected':'' }}>LAND ROVER</option>
    <option value="LEXUS" {{ old('marca', $vehiculo->marca) == 'LEXUS' ? 'selected':'' }}>LEXUS</option>
    <option value="MASERATI" {{ old('marca', $vehiculo->marca) == 'MASERATI' ? 'selected':'' }}>MASERATI</option>
    <option value="MAZDA" {{ old('marca', $vehiculo->marca) == 'MAZDA' ? 'selected':'' }}>MAZDA</option>
    <option value="MERCEDES" {{ old('marca', $vehiculo->marca) == 'MERCEDES' ? 'selected':'' }}>MERCEDES</option>
    <option value="MINI" {{ old('marca', $vehiculo->marca) == 'MINI' ? 'selected':'' }}>MINI</option>
    <option value="MITSUBISHI" {{ old('marca', $vehiculo->marca) == 'MITSUBISHI' ? 'selected':'' }}>MITSUBISHI</option>
    <option value="NISSAN" {{ old('marca', $vehiculo->marca) == 'NISSAN' ? 'selected':'' }}>NISSAN</option>
    <option value="PEUGEOT" {{ old('marca', $vehiculo->marca) == 'PEUGEOT' ? 'selected':'' }}>PEUGEOT</option>
    <option value="PORSCHE" {{ old('marca', $vehiculo->marca) == 'PORSCHE' ? 'selected':'' }}>PORSCHE</option>
    <option value="RENAULT" {{ old('marca', $vehiculo->marca) == 'RENAULT' ? 'selected':'' }}>RENAULT</option>
    <option value="ROLLS-ROYCE" {{ old('marca', $vehiculo->marca) == 'ROLLS-ROYCE' ? 'selected':'' }}>ROLLS-ROYCE</option>
    <option value="SEAT" {{ old('marca', $vehiculo->marca) == 'SEAT' ? 'selected':'' }}>SEAT</option>
    <option value="SKODA" {{ old('marca', $vehiculo->marca) == 'SKODA' ? 'selected':'' }}>SKODA</option>
    <option value="SMART" {{ old('marca', $vehiculo->marca) == 'SMART' ? 'selected':'' }}>SMART</option>
    <option value="SUBARU" {{ old('marca', $vehiculo->marca) == 'SUBARU' ? 'selected':'' }}>SUBARU</option>
    <option value="SUZUKI" {{ old('marca', $vehiculo->marca) == 'SUZUKI' ? 'selected':'' }}>SUZUKI</option>
    <option value="TESLA" {{ old('marca', $vehiculo->marca) == 'TESLA' ? 'selected':'' }}>TESLA</option>
    <option value="TOYOTA" {{ old('marca', $vehiculo->marca) == 'TOYOTA' ? 'selected':'' }}>TOYOTA</option>
    <option value="VOLKSWAGEN" {{ old('marca', $vehiculo->marca) == 'VOLKSWAGEN' ? 'selected':'' }}>VOLKSWAGEN</option>
    <option value="VOLVO" {{ old('marca', $vehiculo->marca) == 'VOLVO' ? 'selected':'' }}>VOLVO</option></select>
</div>
<div class="clear"></div>

<div class="input-group col-xs-5 col-sm-3 col-md-4" style="margin-left:15px;">
<span class="input-group-addon" style="width:80px;">Modelo</span>
<input type="text" class="form-control" name="modelo" placeholder="Ingrese el modelo de su vehiculo" value="{{ old('modelo', $vehiculo->modelo) }}" style="{{ $errors->has('modelo') ? ' border: solid 2px #990606' : '' }}">
</div><br>

<div class="input-group col-xs-5 col-sm-3 col-md-4" style="margin-left:15px;">
<span class="input-group-addon" style="width:80px;">Color</span>
<input type="text" class="form-control" name="color" placeholder="Ingrese el color de su vehiculo" value="{{ old('color', $vehiculo->color) }}" style="{{ $errors->has('color') ? ' border: solid 2px #990606' : '' }}">
</div><br>

<div class="input-group col-xs-5 col-sm-3 col-md-4" style="margin-left:15px;">
<span class="input-group-addon" style="width:80px;">Patente</span>
<input type="text" class="form-control" name="patente" placeholder="Ingrese el numero de patente" value="{{ old('patente', $vehiculo->patente) }}" style="{{ $errors->has('patente') ? ' border: solid 2px #990606' : '' }}">
</div><br>

{{-- <div class="input-group col-xs-5 col-sm-3 col-md-3">
<span class="input-group-addon">Datos adicionales</span>
<input id="msg" type="text" class="form-control" name="msg" placeholder="Info adicional optativa">
</div><br> --}}
