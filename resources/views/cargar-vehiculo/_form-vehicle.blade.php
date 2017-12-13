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
    <option value="BMW">BMW</option>
    <option value="BYD">BYD</option>
    <option value="CHEVROLET">CHEVROLET</option>
    <option value="CITROEN">CITROEN</option>
    <option value="DACIA">DACIA</option>
    <option value="FERRARI">FERRARI</option>
    <option value="FIAT">FIAT</option>
    <option value="FORD">FORD</option>
    <option value="HONDA">HONDA</option>
    <option value="HYUNDAI">HYUNDAI</option>
    <option value="INFINITI">INFINITI</option>
    <option value="ISUZU">ISUZU</option>
    <option value="JAGUAR">JAGUAR</option>
    <option value="JEEP">JEEP</option>
    <option value="KIA">KIA</option>
    <option value="LADA">LADA</option>
    <option value="LAMBORGHINI">LAMBORGHINI</option>
    <option value="LAND ROVER">LAND ROVER</option>
    <option value="LEXUS">LEXUS</option>
    <option value="MASERATI">MASERATI</option>
    <option value="MAZDA">MAZDA</option>
    <option value="MERCEDES">MERCEDES</option>
    <option value="MINI">MINI</option>
    <option value="MITSUBISHI">MITSUBISHI</option>
    <option value="NISSAN">NISSAN</option>
    <option value="PEUGEOT">PEUGEOT</option>
    <option value="PORSCHE">PORSCHE</option>
    <option value="RENAULT">RENAULT</option>
    <option value="ROLLS-ROYCE">ROLLS-ROYCE</option>
    <option value="SEAT">SEAT</option>
    <option value="SKODA">SKODA</option>
    <option value="SMART">SMART</option>
    <option value="SUBARU">SUBARU</option>
    <option value="SUZUKI">SUZUKI</option>
    <option value="TESLA">TESLA</option>
    <option value="TOYOTA">TOYOTA</option>
    <option value="VOLKSWAGEN">VOLKSWAGEN</option>
    <option value="VOLVO">VOLVO</option></select>
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
