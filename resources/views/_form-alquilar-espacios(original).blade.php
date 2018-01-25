<div class="form-generico" id="espacio-form">

  <h3 style="margin-left:2px">{{ $espacio->tipoEspacio }}</h3>
  <h4 style="margin-top:0px; font-size:1.1em;">Estadía con Auto ${{ $espacio->precioAutosMinuto }} por minuto</h4>

  <form class="search-espacios-form" action="{{ route('show.search')}}" method="get">
    <div class="" id="dir_y_vehiculo">
      <input type="search" name="search-espacios-input-direccion" placeholder="¿Dónde querés estacionar?">
      <select name="search-espacios-vehiculo">
        <option value="Auto" selected>Auto</option>
        <option value="Moto">Moto</option>
        <option value="Bicicleta">Bicicleta</option>
      </select>
    </div>
    <div class="search-horario">
      <h5>Llegada</h5>
      <input type="date" name="search-espacios-dia-comienzo" value="">
      <select name="search-espacios-hora-comienzo" class="search-espacios-hora">
        @for ($i=0; $i < 24; $i++)
          @if ($i<10)
            <option value={{ $i }}>0{{ $i }}</option>
          @else
            <option value={{ $i }}>{{ $i }}</option>
          @endif
        @endfor
      </select>
      <select name="search-espacios-minuto-comienzo" class="search-espacios-minuto">
        @for ($i=0; $i < 60; $i+=5)
          @if ($i<10)
            <option value={{ $i }}>0{{ $i }}</option>
          @else
            <option value={{ $i }}>{{ $i }}</option>
          @endif
        @endfor
      </select>
    </div>
    <div class="search-horario">
      <h5>Partida</h5>
      <input type="date" name="search-espacios-dia-fin" value="">
      <select name="search-espacios-hora-fin" class="search-espacios-hora">
        @for ($i=0; $i < 24; $i++)
          @if ($i<10)
            <option value={{ $i }}>0{{ $i }}</option>
          @else
            <option value={{ $i }}>{{ $i }}</option>
          @endif
        @endfor
      </select>
      <select name="search-espacios-minuto-fin" class="search-espacios-minuto">
        @for ($i=0; $i < 60; $i+=5)
          @if ($i<10)
            <option value={{ $i }}>0{{ $i }}</option>
          @else
            <option value={{ $i }}>{{ $i }}</option>
          @endif
        @endfor
      </select>
    </div>
    <button type="submit" name="search-espacios-submit"><i class="fa fa-search"></i></button>
    <input type="submit" name="BUSCAR" value="BUSCAR">
  </form>
</div>


<form method="POST" action="" style="display:inline;" onsubmit="confirm('ESTÁS POR RESERVAR ESTE ESPACIO')">
  {{ csrf_field() }}
  <button id="reservar-cochera" type="submit" class="btn btn-success">RESERVAR ESTE ESPACIO</button>
</form>
