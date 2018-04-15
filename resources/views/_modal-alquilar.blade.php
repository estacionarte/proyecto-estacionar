<div id="modal{{ $espacio->id }}" class="modalAlquilar">
  <div class="modalAlquilar-content" id="yo">
    <span class="alquilar-close" id="btn{{ $espacio->id }}">&times;</span>
    <h2>Reservar espacio</h2>
    <h3>Nombre Espacio por Usuario</h3>

    <hr>


    @auth
      <div class="form-generico">

        <form action="{{ route('alquilar', $espacio->id) }}" method="post" onsubmit="return validarForm();">
          {{ csrf_field() }}

          <div class="modalAlquilar-form-div">

            <label>Vehículo</label>
            <select class="" name="vehiculo">

              @forelse (Auth::user()->vehiculos as $vehiculo)
                <option value="{{$vehiculo->id}}">{{$vehiculo->datos()}}</option>
              @empty
                <option value="">Cargar vehículo</option>
              @endforelse
            </select>

          </div>

          <div class="modalAlquilar-form-div div-nodisponible" style="font-size:1.2em; color: #990606; display:none;">
            <p>Espacio no disponible en este horario</p>
          </div>

          <div class="modalAlquilar-form-div">

            <label>Fecha y Hora</label>

            <div class="modalAlquilar-form-div-div">
              <div class="modalAlquilar-form-horarios">
                <input type="date" name="alquiler-dia-comienzo" value="{{ $fechallegada->format('Y-m-d') }}">
                <select name="alquiler-hora-comienzo" class="search-espacios-hora">
                  @for ($i=0; $i < 24; $i++)
                    @if ($i<10)
                      <option value={{ $i }} {{ $i == $fechallegada->format('H') ? 'selected' : '' }}>0{{ $i }}</option>
                    @else
                      <option value={{ $i }} {{ $i == $fechallegada->format('H') ? 'selected' : '' }}>{{ $i }}</option>
                    @endif
                  @endfor
                </select>
                <span>:</span>
                <select name="alquiler-minuto-comienzo" class="search-espacios-minuto">
                  @for ($i=0; $i < 60; $i+=5)
                    @if ($i<10)
                      <option value={{ $i }} {{ $i == $fechallegada->format('i') ? 'selected' : '' }}>0{{ $i }}</option>
                    @else
                      <option value={{ $i }} {{ $i == $fechallegada->format('i') ? 'selected' : '' }}>{{ $i }}</option>
                    @endif
                  @endfor
                </select>
              </div>

              <span style="font-size:1.4em; line-height: 47px; vertical-align:text-bottom;">&#10140;</span>

              <div class="modalAlquilar-form-horarios">
                <input type="date" name="alquiler-dia-fin" value="{{ $fechapartida->format('Y-m-d') }}">
                <select name="alquiler-hora-fin" class="search-espacios-hora">
                  @for ($i=0; $i < 24; $i++)
                    @if ($i<10)
                      <option value={{ $i }} {{ $i == $fechapartida->format('H') ? 'selected' : '' }}>0{{ $i }}</option>
                    @else
                      <option value={{ $i }} {{ $i == $fechapartida->format('H') ? 'selected' : '' }}>{{ $i }}</option>
                    @endif
                  @endfor
                </select>
                <span>:</span>
                <select name="alquiler-minuto-fin" class="search-espacios-minuto">
                  @for ($i=0; $i < 60; $i+=5)
                    @if ($i<10)
                      <option value={{ $i }} {{ $i == $fechapartida->format('i') ? 'selected' : '' }}>0{{ $i }}</option>
                    @else
                      <option value={{ $i }} {{ $i == $fechapartida->format('i') ? 'selected' : '' }}>{{ $i }}</option>
                    @endif
                  @endfor
                </select>
              </div>
            </div>

          </div>

          <div class="modalAlquilar-form-div">

            <div class="modalAlquilar-form-lineadetalle">
              <div class="lineadetalle-motivo">
                <span>Precio</span>
                <span>|?|</span>
              </div>
              <div class="lineadetalle-precio">
                <span>$</span><span precio='si'>{{ $espacio->precio($fechallegada, $fechapartida) }}</span>
              </div>
            </div>

            <div class="modalAlquilar-form-lineadetalle lineadetalle-descuento">
              <div class="lineadetalle-motivo">
                <span>Descuento</span>
                <span>|?|</span>
              </div>
              <div class="lineadetalle-precio">
                <span>-$</span><span descuento='si'>{{ $espacio->descuento($fechallegada, $fechapartida) }}</span>
              </div>
            </div>

            <div class="modalAlquilar-form-lineadetalle lineadetalle-total">
              <div class="lineadetalle-motivo">
                <span>TOTAL</span>
              </div>
              <div class="lineadetalle-precio">
                <span>$</span><span total='si'>{{ $espacio->precioFinal($fechallegada, $fechapartida) }}</span>
              </div>
            </div>

          </div>

          <input type="submit" name="reservar" value="RESERVAR">

        </form>

      </div>

      <p>Todavía no se hará ningún cobro</p>

    @endauth

    @guest

      <div class="">
        <h4 style="text-align:center; margin: 15px auto;">Debés <a href="{{ route('login') }}">iniciar sesión</a> antes de alquilar un espacio</h4>
      </div>

    @endguest

  </div>
</div>
