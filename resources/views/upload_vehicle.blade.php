@extends('layouts.app')
@section('title') Cargar Vehiculo @endsection
@section('signin')

  @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

  <h2>Cargar Vehiculo</h2>
  <form class="" action="{{ route('create.upload.vehicle') }}" method="post">
      {{ csrf_field() }}
      <label>Tipo de vehiculo</label>
      <select id="vehiculo" class="" name="tipoVehiculo" onchange="mostrarMarca()">
        <option value="-1" {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == '-1' ? 'selected':'' }}>Seleccioná</option>
        <option value="Automovil"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Automovil' ? 'selected':'' }}>AUTOMOVIL</option>
        <option value="Camión"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Camión' ? 'selected':'' }}>CAMIÓN</option>
        <option value="Camioneta"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Camioneta' ? 'selected':'' }}>CAMIONETA</option>
        <option value="Motocicleta"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Motocicleta' ? 'selected':'' }}>MOTOCICLETA</option>
        <option value="Bicicleta"  {{ old('tipoVehiculo', $vehiculo->tipoVehiculo) == 'Bicicleta' ? 'selected':'' }}>BICICLETA</option>
      </select><br>

      <label>Marca
      <select id="vehiculo-marca" name="marca" class="" disabled>
        <option value="-1" selected>Seleccioná</option>
        <option value="1" {{ old('marca', $vehiculo->marca) == '1' ? 'selected':'' }}>ABARTH</option>
        <option value="2" {{ old('marca', $vehiculo->marca) == '2' ? 'selected':'' }}>ALFA ROMEO</option>
        <option value="3">ASTON MARTIN</option>
        <option value="4">AUDI</option>
        <option value="5">BENTLEY</option>
        <option value="6">BMW</option>
        <option value="7">BYD</option>
        <option value="8">CHEVROLET</option>
        <option value="9">CITROEN</option>
        <option value="10">DACIA</option>
        <option value="11">DFSK</option>
        <option value="12">DS</option>
        <option value="13">FERRARI</option>
        <option value="14">FIAT</option>
        <option value="15">FORD</option>
        <option value="16">HONDA</option>
        <option value="17">HYUNDAI</option>
        <option value="18">INFINITI</option>
        <option value="19">ISUZU</option>
        <option value="20">JAGUAR</option>
        <option value="21">JEEP</option>
        <option value="22">KIA</option>
        <option value="23">LADA</option>
        <option value="24">LAMBORGHINI</option>
        <option value="25">LANCIA</option>
        <option value="26">LAND ROVER</option>
        <option value="27">LEXUS</option>
        <option value="28">MAHINDRA</option>
        <option value="29">MASERATI</option>
        <option value="30">MAZDA</option>
        <option value="31">MERCEDES</option>
        <option value="32">MINI</option>
        <option value="33">MITSUBISHI</option>
        <option value="34">MORGAN</option>
        <option value="35">NISSAN</option>
        <option value="36">OPEL</option>
        <option value="37">PEUGEOT</option>
        <option value="38">PORSCHE</option>
        <option value="39">RENAULT</option>
        <option value="40">ROLLS-ROYCE</option>
        <option value="41">SEAT</option>
        <option value="42">SKODA</option>
        <option value="43">SMART</option>
        <option value="44">SSANGYONG</option>
        <option value="45">SUBARU</option>
        <option value="46">SUZUKI</option>
        <option value="47">TATA</option>
        <option value="48">TESLA</option>
        <option value="49">TOYOTA</option>
        <option value="50">VOLKSWAGEN</option>
        <option value="51">VOLVO</option></select>
      </label><br>

      <label for="">Modelo</label>
      <input id="vehiculo-modelo" type="text" name="modelo" value="{{ old('modelo', $vehiculo->modelo) }}"><br>

      <label for="">Color</label>
      <input type="text" name="color" value="{{ old('color', $vehiculo->color) }}"><br>

      <label for="">Patente</label>
      <input type="text" name="patente" value="{{ old('color', $vehiculo->patente) }}"><br>

      {{-- <label for="">Datos adicionales</label>
      <textarea name="name" rows="8" cols="80" maxlength="250"></textarea><br> --}}

      <input type="submit" name="" value="Cargar vehiculo">
  </form>

      <script type="text/javascript">
        function mostrarMarca() {
          var mostrar = document.getElementById("vehiculo").value;
          if (mostrar == -1 || mostrar == 'Bicicleta') {
            document.getElementById("vehiculo-marca").disabled = true;
            document.getElementById("vehiculo-modelo").removeAttr("required");
          }else {
            document.getElementById("vehiculo-marca").disabled = false;
          }
        }

      </script>
@endsection
